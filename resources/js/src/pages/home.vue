<script setup>
    import { ref , onMounted } from 'vue';
    import Layout from '../layouts/default.vue'
    import { BarChart } from 'vue-chart-3';
    import { Chart, registerables } from "chart.js";
    import Select2 from "../components/Select2.vue";

    // Register Chart.js components
    Chart.register(...registerables);
    const isMobile = ref(false);
    const selectedPeriod = ref("");

    const selectOptionsx = [2025 ,2024,2023,2022,2021];
    const selectOptions = [
        { id : 2025 , value : 'السنة الحالية' } ,
        { id : 2024 , value : 'السنة الماضية' } ,
        { id : 2023 , value : 'سنة 2023' } ,
        { id :  2022, value : 'سنة 2022' } ,
        { id : 2021 , value : 'سنة 2021' } ,
    ];

    const cards = ref([
        {
            title: 'اجمالي الارباح',
            value: '456',
            unit: 'مليون',
            icon: 'bx bx-dollar',
            class: null
        },
        {
            title: 'عدد العملاء',
            value: '230',
            unit: 'عميل',
            icon: 'bx bx-user',
            class: 'green'
        }
    ])

    const testData = {
      labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو','يونيو','يوليو'],
      datasets: [
        {
            label: "المبيعات",
            data: [90000, 44000, 70000, 45000, 22000 , 70000 , 22000],
            backgroundColor: ['#0CB9D8'],
        },
        {
            label: "المصروفات",
            data: [-40000, 0, -40000, -30000, -22000 , -7000 , -16000],
            backgroundColor: ['#e6f8fb'],
        }
      ],
    };

    const formatNumber = (value) => {
        if (value >= 1_000_000) return (value / 1_000_000).toFixed(1) + "M SAR";
        if (value >= 1_000) return (value / 1_000).toFixed(1) + "K SAR";
        return value + " SAR";
    };

    const chartOptions = ref({
        responsive: true,
        maintainAspectRatio: false,
        borderRadius: 5 ,
        barThickness: 40,
        plugins: {
            legend: {
                labels: {
                    font: { family: "Arial", size: 10 },
                    color: "#333",
                },
                display: false, // Hide the legend
            },
            tooltip: {
                titleFont: { family: "DINNextLTW23", size: 12, weight: "600", style: "normal" },  // Custom font for title
                bodyFont: { family: "DINNextLTW23", size: 12, weight: "600", style: "normal" },  // Custom font for body
                footerFont: { family: "DINNextLTW23", size: 12, weight: "600", style: "normal" },  // Custom font for footer
                callbacks: {
                    label: function(context) {
                        let label = context.dataset.label || '';

                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed.y !== null) {
                            label += new Intl.NumberFormat('en-US', { style: 'currency', currency: 'SAR' }).format(context.parsed.y ,);
                        }
                        return label;
                    }
                }
            },

        },
        scales: {
            x: {
                reverse: true, // Flip x-axis for RTL
                stacked: true, // Enable stacking
                ticks: { font: { family: "DINNextLTW23", size: 12 , weight : '600' }, color: "#777" },
                grid: {
                    drawOnChartArea: false, // Hide all grid lines
                    drawTicks: false, // Hide small tick marks
                },
            },
            y: {
                ticks: { stepSize: 25000, font: { family: "DINNextLTW23", size: 12, weight : '600'  }, color: "#777" },
                grid: {
                    drawTicks: false, // Hide small tick marks
                    color:"#efefef", // Show only one vertical line
                },
            },
        },
    });

    const websites= [
        {
            name : 'نجم العلم', client : 'سامي الشمري',
            logo : '/assets/images/demo/websites/logo-1.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025',
        },
        {
            name : 'أفق الابتكار', client : 'ريم الفايد',
            logo : '/assets/images/demo/websites/logo-2.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025',
        },
        {
            name : 'نور المعرفة', client : 'حسان الجابري',
            logo : '/assets/images/demo/websites/logo-3.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025',
        },
        {
            name : 'إبداع المستقبل', client : 'نورا بن يوسف',
            logo : '/assets/images/demo/websites/logo-4.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025',
        },
        {
            name : 'حلول متكاملة', client : 'خالد الصالح',
            logo : '/assets/images/demo/websites/logo-5.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025',
        },
        {
            name : 'إشراقة فكر', client : 'هالة العابد',
            logo : '/assets/images/demo/websites/logo-6.webp',
            products : 1500, bookings : 800, created_at : '9:00 PM 25/1/2025',
        },
    ]

    const checkMobile = () => {
        if (document.documentElement.clientWidth <= 600) {
            chartOptions.value.barThickness = 15
            chartOptions.value.borderRadius = 10
            isMobile.value = true;
        } else {
            chartOptions.value.barThickness = 40
            chartOptions.value.borderRadius = 5
            isMobile.value = false;
        }
    }

    onMounted(() => {
        window.addEventListener('resize', function(){
            checkMobile()
        });
        checkMobile()
    });


</script>

<template>

    <Layout>

        <div class="row g-0 p-0">
            <div class="col-sm">
                <div class="row g-0 d-gr">
                    <div class="col-12" v-for="(card , index) in cards">
                            <div class="anylt-card m-2">
                                <div :class="'logo-icon '+ (card.class)">
                                    <i :class="card.icon+' '+ ('') "></i>
                                </div>
                                <div>
                                    <div class="anylt-card-title py-2">
                                        {{ card.value }} <span>{{ card.unit }}</span>
                                    </div>
                                    <div class="anylt-card-subtitle">
                                        {{ card.title }}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-8 col-lg-8 d-grid">
                <div class="anylt-card my-2 mx-2 flex-column pt-3">
                    <div class="d-flex flex-column flex-xl-row flex-lg-row justify-content-between align-items-center mb-3">
                        <div>
                            <span class="fw-600 text-secondary">{{ 'صافي الأرباح' }}</span>
                            <span class="fw-bold text-primary fs-4">  205 </span>
                            <span class="text-primary fw-600 small">{{ 'ألف' }}</span>
                        </div>
                        <div class="filter-select">
                            <Select2 v-model="selectedPeriod" :prefixText="'الفترة'" defaultValue="0" :multiple="false" :options="selectOptions" placeholder="Choose an option" />
                        </div>
                    </div>

                    <div class="chart-container w-100" dir="rtl">
                        <BarChart :chartData="testData" :options="chartOptions" :height="210" />
                    </div>

                </div>
            </div>

        </div>


        <div class="s-card mx-2 p-4 mt-40px">

            <div class="d-flex align-items-center mb-4">
                <i class="bx bx-window-alt text-primary2 fs-3 bx-fix--4"></i>
                <span class=" fs-3 text-primary3 fs-4 fw-600 ms-3">{{ 'أخر الموافع المضافة' }}</span>
            </div>

            <div class="website-list">
                <div v-if="!isMobile" v-for="(website , index) in websites" :key="index" class="website-item d-flex align-items-center justify-content-between justify-content-between mb-2">
                    <div class="d-flex align-items-center">
                        <img :src="website.logo" alt="" class="website-image">
                        <div class="website-info ps-4">
                            <div class="website-name fs-5 fw-bold">{{ website.name }}</div>
                            <div class="website-url fw-600 text-secondary mt-1">{{ website.client }}</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="fw-600 mb-1"> عدد السلع </div>
                        <div class="fw-600 text-primary2"> {{ website.products }} </div>
                    </div>
                    <div class="text-center">
                        <div class="fw-600 mb-1"> عدد الحجوزات </div>
                        <div class="fw-600 text-primary2"> {{ website.bookings }} </div>
                    </div>
                    <div class="text-center px-5">
                        <div class="fw-600 mb-1"> تاريخ إنشاء الموقع </div>
                        <div class="fw-600 text-primary2" dir="ltr"> {{ website.created_at }} </div>
                    </div>
                </div>
                <div v-if="isMobile" v-for="(website , index) in websites" :key="index" class="website-item website-item-border shadow-none d-flex flex-column justify-content-between justify-content-between mb-2">
                    <div class="d-flex align-items-center website-item-header">
                        <img :src="website.logo" alt="" class="website-image md rounded">
                        <div class="website-info ps-4">
                            <div class="website-name fs-6 fw-bold">{{ website.name }}</div>
                            <div class="website-url fw-600 text-secondary mt-1 small">{{ website.client }}</div>
                        </div>
                    </div>
                    <div class="text-center d-flex justify-content-between mt-4">
                        <div class="fw-600 mb-1 me-4"> عدد السلع </div>
                        <div class="fw-600 text-primary2"> {{ website.products }} </div>
                    </div>
                    <div class="text-center d-flex justify-content-between">
                        <div class="fw-600 mb-1 me-4"> عدد الحجوزات </div>
                        <div class="fw-600 text-primary2"> {{ website.bookings }} </div>
                    </div>
                    <div class="text-center d-flex justify-content-between">
                        <div class="fw-600 mb-1 me-4"> تاريخ إنشاء الموقع </div>
                        <div class="fw-600 text-primary2" dir="ltr"> {{ website.created_at }} </div>
                    </div>
                </div>
            </div>

        </div>


    </Layout>

</template>
