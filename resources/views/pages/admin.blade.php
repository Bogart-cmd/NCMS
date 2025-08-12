@include('partials.header', ['title'=> 'Dashboard'])
<style>
  :root { 
    --font-primary: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif; 
  }
  html, body, button, input, select, textarea { 
    font-family: var(--font-primary) !important; 
  }
  
  /* Custom admin styles */
  .admin-dashboard {
    transition: all 0.3s ease;
  }
  
  .stat-card {
    transition: all 0.2s ease;
  }
  
  .stat-card:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }
  
  .chart-container {
    min-height: 240px;
  }
  
  @media (max-width: 768px) {
    .chart-container {
      min-height: 200px;
    }
  }
</style>

<x-adminHeader></x-adminHeader>
<x-adminSidebar :user='auth()->user()->usertype'></x-adminSidebar>
<x-message></x-message>
{{-- @dd($total_count) --}}
<main class="admin-dashboard lg:ml-64 ml-0 pt-20 lg:pt-24 px-3 lg:px-6 min-h-screen bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <!-- Page Header -->
        <div class="mb-4 lg:mb-6">
            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-[#168753] mb-1">Dashboard</h1>
            <p class="text-gray-600 text-sm lg:text-base">Welcome back! Here's what's happening with your students.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-4 mb-4 lg:mb-6">
            <div class="stat-card bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-600">Total Students</p>
                        <p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900">{{$total_student}}</p>
                    </div>
                    <div class="w-8 h-8 lg:w-10 lg:h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="stat-card bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-600">New Students</p>
                        <p class="text-lg sm:text-xl lg:text-2xl font-bold text-green-600">{{$totalNewStudent}}</p>
                    </div>
                    <div class="w-8 h-8 lg:w-10 lg:h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="stat-card bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-all sm:col-span-2 lg:col-span-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium text-gray-600">Pending Students</p>
                        <p class="text-lg sm:text-xl lg:text-2xl font-bold text-orange-600">{{$total_pending}}</p>
                    </div>
                    <div class="w-8 h-8 lg:w-10 lg:h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 lg:w-5 lg:h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 lg:gap-4">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3">Student by Program</h2>
                <div class="chart-container">
                    <canvas id="bar"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3">Student by Gender</h2>
                <div class="chart-container flex items-center justify-center">
                    <canvas id="doughnut"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3">Student by Age</h2>
                <div class="chart-container">
                    <canvas id="horizontal-bar"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3">Applicants by Month</h2>
                <div class="chart-container flex items-center justify-center">
                    <canvas id="line"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Enhanced Chart.js configuration with better responsive options
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    usePointStyle: true,
                    padding: 15,
                    font: {
                        size: window.innerWidth < 768 ? 10 : 12
                    }
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    font: {
                        size: window.innerWidth < 768 ? 9 : 11
                    }
                }
            },
            y: {
                ticks: {
                    font: {
                        size: window.innerWidth < 768 ? 9 : 11
                    }
                }
            }
        }
    };

    // Age Distribution Chart
    const horizontal = document.getElementById('horizontal-bar').getContext('2d');
    const chart_horizontal = new Chart(horizontal, {
        type: 'bar',
        data: {
            labels: {!!json_encode($labels_age)!!},
            datasets: [{
                label: 'Students',
                data: {!!json_encode($values_age)!!},
                backgroundColor: 'rgba(22, 135, 83, 0.8)',
                borderColor: 'rgba(22, 135, 83, 1)',
                borderWidth: 1
            }],
        },
        options: {
            ...chartOptions,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                }
            }
        }
    });

    // Program Distribution Chart
    const bar = document.getElementById('bar').getContext('2d');
    const chart_bar = new Chart(bar, {
        type: 'bar',
        data: {
            labels: {!!json_encode($labels_course)!!},
            datasets: [{
                label: 'Students',
                data: {!!json_encode($values_course)!!},
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }],
        },
        options: {
            ...chartOptions,
            scales: {
                x: {
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                }
            }
        }
    });

    // Gender Distribution Chart
    const doughnut = document.getElementById('doughnut').getContext('2d');
    const chart_doughnut = new Chart(doughnut, {
        type: 'doughnut',
        data: {
            labels: {!!json_encode($labels_gender)!!},
            datasets: [{
                label: 'Students',
                data: {!!json_encode($values_gender)!!},
                backgroundColor: [
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(168, 85, 247, 0.8)'
                ],
                borderColor: [
                    'rgba(34, 197, 94, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(168, 85, 247, 1)'
                ],
                borderWidth: 2
            }],
        },
        options: {
            ...chartOptions,
            cutout: '60%'
        }
    });

    // Monthly Applicants Chart
    const line = document.getElementById('line').getContext('2d');
    const chart_line = new Chart(line, {
        type: 'line',
        data: {
            labels: {!!json_encode($data_month_labels)!!},
            datasets: [{
                label: 'Applicants',
                data: {!!json_encode($data_month_values)!!},
                borderColor: 'rgba(245, 158, 11, 1)',
                backgroundColor: 'rgba(245, 158, 11, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }],
        },
        options: {
            ...chartOptions,
            scales: {
                x: {
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                }
            }
        }
    });

    // Handle window resize for better mobile experience
    window.addEventListener('resize', function() {
        // Update font sizes for mobile
        const isMobile = window.innerWidth < 768;
        const newFontSize = isMobile ? 9 : 11;
        const newLegendFontSize = isMobile ? 10 : 12;
        
        [chart_horizontal, chart_bar, chart_doughnut, chart_line].forEach(chart => {
            if (chart && chart.options) {
                if (chart.options.plugins && chart.options.plugins.legend) {
                    chart.options.plugins.legend.labels.font.size = newLegendFontSize;
                }
                if (chart.options.scales) {
                    Object.values(chart.options.scales).forEach(scale => {
                        if (scale.ticks) {
                            scale.ticks.font.size = newFontSize;
                        }
                    });
                }
                chart.update();
            }
        });
    });
</script>
@include('partials.footer')
