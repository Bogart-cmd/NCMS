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

        @if(config('app.debug'))
        <div class="bg-white rounded-lg shadow-sm border border-indigo-200 p-4 mb-4">
            <div class="flex items-center justify-between gap-3 flex-wrap">
                <form action="{{ route('debug.generate_region6_students') }}" method="POST" class="flex items-end gap-3 flex-wrap">
                    @csrf
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Generate Test Students (Negros Island)</label>
                        <input type="number" name="count" min="1" max="200" value="30" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#168753] focus:border-transparent"/>
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors font-medium" type="submit">Generate</button>
                </form>
                <form action="{{ route('debug.remove_debug_students') }}" method="POST" class="flex items-end gap-3">
                    @csrf
                    <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors font-medium" type="submit">Remove All Debug Students</button>
                </form>
                <span class="text-xs text-gray-500">Visible only in debug mode</span>
            </div>
        </div>
        @endif

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
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-shadow cursor-pointer" onclick="showChartDetails('program', 'Student Distribution by Program')">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 flex items-center justify-between">
                    Student by Program
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </h2>
                <div class="chart-container">
                    <canvas id="bar"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-shadow cursor-pointer" onclick="showChartDetails('gender', 'Student Distribution by Gender')">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 flex items-center justify-between">
                    Student by Gender
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </h2>
                <div class="chart-container flex items-center justify-center">
                    <canvas id="doughnut"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-shadow cursor-pointer" onclick="showChartDetails('age', 'Student Distribution by Age')">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 flex items-center justify-between">
                    Student by Age
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </h2>
                <div class="chart-container">
                    <canvas id="horizontal-bar"></canvas>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-shadow cursor-pointer" onclick="showChartDetails('monthly', 'Monthly Applicant Trends')">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 flex items-center justify-between">
                    Applicants by Month
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </h2>
                <div class="chart-container flex items-center justify-center">
                    <canvas id="line"></canvas>
                </div>
            </div>

            <!-- New Student Origins Chart -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-shadow cursor-pointer lg:col-span-2" onclick="showChartDetails('origins', 'Student Origins by Region')">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 flex items-center justify-between">
                    Student Origins by Region
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </h2>
                <div class="chart-container">
                    <canvas id="origins-chart"></canvas>
                </div>
            </div>

            <!-- Student Origins by Province Chart -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-shadow cursor-pointer" onclick="showChartDetails('provinces', 'Student Origins by Province')">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 flex items-center justify-between">
                    Student Origins by Province
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </h2>
                <div class="chart-container">
                    <canvas id="provinces-chart"></canvas>
                </div>
            </div>

            <!-- Student Origins by City Chart -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-3 lg:p-4 hover:shadow-md transition-shadow cursor-pointer" onclick="showChartDetails('cities', 'Student Origins by City')">
                <h2 class="text-base lg:text-lg font-semibold text-gray-900 mb-3 flex items-center justify-between">
                    Student Origins by City
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </h2>
                <div class="chart-container" style="min-height: 200px;">
                    <canvas id="cities-chart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Details Modal -->
    <div id="chartModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 id="modalTitle" class="text-xl font-semibold text-gray-900">Chart Details</h3>
                <button onclick="closeChartModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto">
                <div id="modalContent" class="space-y-4">
                    <!-- Content will be dynamically populated -->
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

    // Student Origins Chart
    const originsChart = document.getElementById('origins-chart').getContext('2d');
    const chart_origins = new Chart(originsChart, {
        type: 'doughnut',
        data: {
            labels: {!!json_encode($origins_labels)!!},
            datasets: [{
                label: 'Students',
                data: {!!json_encode($origins_values)!!},
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',   // Blue
                    'rgba(16, 185, 129, 0.8)',   // Green
                    'rgba(245, 158, 11, 0.8)',   // Yellow
                    'rgba(239, 68, 68, 0.8)',    // Red
                    'rgba(139, 92, 246, 0.8)',   // Purple
                    'rgba(236, 72, 153, 0.8)',   // Pink
                    'rgba(251, 146, 60, 0.8)',   // Orange
                    'rgba(34, 197, 94, 0.8)',    // Light Green
                    'rgba(168, 85, 247, 0.8)',   // Violet
                    'rgba(6, 182, 212, 0.8)'     // Cyan
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(139, 92, 246, 1)',
                    'rgba(236, 72, 153, 1)',
                    'rgba(251, 146, 60, 1)',
                    'rgba(34, 197, 94, 1)',
                    'rgba(168, 85, 247, 1)',
                    'rgba(6, 182, 212, 1)'
                ],
                borderWidth: 2
            }],
        },
        options: {
            ...chartOptions,
            cutout: '50%',
            plugins: {
                ...chartOptions.plugins,
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 15,
                        font: {
                            size: window.innerWidth < 768 ? 10 : 11
                        }
                    }
                }
            }
        }
    });

    // Student Origins by Province Chart
    const provincesChart = document.getElementById('provinces-chart').getContext('2d');
    
    // Debug logging
    console.log('Provinces Labels:', {!!json_encode($provinces_labels)!!});
    console.log('Provinces Values:', {!!json_encode($provinces_values)!!});
    
    // Check if we have valid data
    const provincesLabels = {!!json_encode($provinces_labels)!!};
    const provincesValues = {!!json_encode($provinces_values)!!};
    
    let chart_provinces = null; // Declare variable outside if statement
    
    if (provincesLabels.length === 0 || (provincesLabels.length === 1 && provincesLabels[0] === 'No Province Data')) {
        // Show a message instead of chart
        provincesChart.canvas.parentElement.innerHTML = '<div class="flex items-center justify-center h-full text-gray-500"><p>No province data available</p></div>';
    } else {
        chart_provinces = new Chart(provincesChart, {
        type: 'bar',
        data: {
            labels: {!!json_encode($provinces_labels)!!},
            datasets: [{
                label: 'Students',
                data: {!!json_encode($provinces_values)!!},
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',   // Blue
                    'rgba(16, 185, 129, 0.8)',   // Green
                    'rgba(245, 158, 11, 0.8)',   // Yellow
                    'rgba(239, 68, 68, 0.8)',    // Red
                    'rgba(139, 92, 246, 0.8)',   // Purple
                    'rgba(236, 72, 153, 0.8)',   // Pink
                    'rgba(251, 146, 60, 0.8)',   // Orange
                    'rgba(34, 197, 94, 0.8)',    // Light Green
                    'rgba(168, 85, 247, 0.8)',   // Violet
                    'rgba(6, 182, 212, 0.8)',    // Cyan
                    'rgba(251, 191, 36, 0.8)',   // Amber
                    'rgba(52, 211, 153, 0.8)',   // Emerald
                    'rgba(99, 102, 241, 0.8)',   // Indigo
                    'rgba(244, 63, 94, 0.8)',    // Rose
                    'rgba(120, 113, 108, 0.8)'   // Stone
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(139, 92, 246, 1)',
                    'rgba(236, 72, 153, 1)',
                    'rgba(251, 146, 60, 1)',
                    'rgba(34, 197, 94, 1)',
                    'rgba(168, 85, 247, 1)',
                    'rgba(6, 182, 212, 1)',
                    'rgba(251, 191, 36, 1)',
                    'rgba(52, 211, 153, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(244, 63, 94, 1)',
                    'rgba(120, 113, 108, 1)'
                ],
                borderWidth: 1
            }],
        },
        options: {
            ...chartOptions,
            scales: {
                x: {
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    },
                    ticks: {
                        maxRotation: 45,
                        minRotation: 0
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
    } // Close the else statement for provinces chart

    // Student Origins by City Chart
    const citiesChart = document.getElementById('cities-chart').getContext('2d');
    
    // Debug logging
    console.log('Cities Labels:', {!!json_encode($cities_labels)!!});
    console.log('Cities Values:', {!!json_encode($cities_values)!!});
    
    // Check if we have valid data
    const citiesLabels = {!!json_encode($cities_labels)!!};
    const citiesValues = {!!json_encode($cities_values)!!};
    
    let chart_cities = null; // Declare variable outside if statement
    
    if (citiesLabels.length === 0 || (citiesLabels.length === 1 && citiesLabels[0] === 'No City Data')) {
        // Show a message instead of chart
        citiesChart.canvas.parentElement.innerHTML = '<div class="flex items-center justify-center h-full text-gray-500"><p>No city data available</p></div>';
    } else {
        chart_cities = new Chart(citiesChart, {
        type: 'bar',
        data: {
            labels: {!!json_encode($cities_labels)!!},
            datasets: [{
                label: 'Students',
                data: {!!json_encode($cities_values)!!},
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',   // Blue
                    'rgba(16, 185, 129, 0.8)',   // Green
                    'rgba(245, 158, 11, 0.8)',   // Yellow
                    'rgba(239, 68, 68, 0.8)',    // Red
                    'rgba(139, 92, 246, 0.8)',   // Purple
                    'rgba(236, 72, 153, 0.8)',   // Pink
                    'rgba(251, 146, 60, 0.8)',   // Orange
                    'rgba(34, 197, 94, 0.8)',    // Light Green
                    'rgba(168, 85, 247, 0.8)',   // Violet
                    'rgba(6, 182, 212, 0.8)',    // Cyan
                    'rgba(251, 191, 36, 0.8)',   // Amber
                    'rgba(52, 211, 153, 0.8)',   // Emerald
                    'rgba(99, 102, 241, 0.8)',   // Indigo
                    'rgba(244, 63, 94, 0.8)',    // Rose
                    'rgba(120, 113, 108, 0.8)',  // Stone
                    'rgba(34, 197, 94, 0.8)',    // Light Green
                    'rgba(168, 85, 247, 0.8)',   // Violet
                    'rgba(6, 182, 212, 0.8)',    // Cyan
                    'rgba(251, 191, 36, 0.8)',   // Amber
                    'rgba(52, 211, 153, 0.8)'    // Emerald
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(139, 92, 246, 1)',
                    'rgba(236, 72, 153, 1)',
                    'rgba(251, 146, 60, 1)',
                    'rgba(34, 197, 94, 1)',
                    'rgba(168, 85, 247, 1)',
                    'rgba(6, 182, 212, 1)',
                    'rgba(251, 191, 36, 1)',
                    'rgba(52, 211, 153, 1)',
                    'rgba(99, 102, 241, 1)',
                    'rgba(244, 63, 94, 1)',
                    'rgba(120, 113, 108, 1)',
                    'rgba(34, 197, 94, 1)',
                    'rgba(168, 85, 247, 1)',
                    'rgba(6, 182, 212, 1)',
                    'rgba(251, 191, 36, 1)',
                    'rgba(52, 211, 153, 1)'
                ],
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
    } // Close the else statement for cities chart

    // Handle window resize for better mobile experience
    window.addEventListener('resize', function() {
        // Update font sizes for mobile
        const isMobile = window.innerWidth < 768;
        const newFontSize = isMobile ? 9 : 11;
        const newLegendFontSize = isMobile ? 10 : 12;
        
        [chart_horizontal, chart_bar, chart_doughnut, chart_line, chart_origins, chart_provinces, chart_cities].filter(chart => chart !== null).forEach(chart => {
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

    // Chart interaction functions
    function showChartDetails(chartType, title) {
        const modal = document.getElementById('chartModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalContent = document.getElementById('modalContent');
        
        modalTitle.textContent = title;
        
        let content = '';
        
        switch(chartType) {
            case 'program':
                content = generateProgramDetails();
                break;
            case 'gender':
                content = generateGenderDetails();
                break;
            case 'age':
                content = generateAgeDetails();
                break;
            case 'monthly':
                content = generateMonthlyDetails();
                break;
            case 'origins':
                content = generateOriginsDetails();
                break;
            case 'provinces':
                content = generateProvincesDetails();
                break;
            case 'cities':
                content = generateCitiesDetails();
                break;
        }
        
        modalContent.innerHTML = content;
        modal.classList.remove('hidden');
        // Prevent background page from scrolling when modal is open
        document.body.style.overflow = 'hidden';
    }

    function closeChartModal() {
        document.getElementById('chartModal').classList.add('hidden');
        // Restore page scrolling
        document.body.style.overflow = '';
    }

    function generateProgramDetails() {
        const labels = {!!json_encode($labels_course)!!};
        const values = {!!json_encode($values_course)!!};
        
        let content = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
        content += '<div><h4 class="text-lg font-semibold mb-4">Program Distribution</h4>';
        content += '<div class="space-y-3">';
        
        labels.forEach((label, index) => {
            const percentage = ((values[index] / {!!$total_student!!}) * 100).toFixed(1);
            content += `<div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="font-medium">${label}</span>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">${values[index]} students</span>
                    <span class="text-sm font-semibold text-blue-600">${percentage}%</span>
                </div>
            </div>`;
        });
        
        content += '</div></div>';
        content += '<div class="flex items-center justify-center"><canvas id="modalProgramChart" width="300" height="300"></canvas></div>';
        content += '</div>';
        
        // Render chart in modal
        setTimeout(() => {
            const ctx = document.getElementById('modalProgramChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.8)',
                            'rgba(16, 185, 129, 0.8)',
                            'rgba(245, 158, 11, 0.8)',
                            'rgba(239, 68, 68, 0.8)',
                            'rgba(139, 92, 246, 0.8)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        }, 100);
        
        return content;
    }

    function generateGenderDetails() {
        const labels = {!!json_encode($labels_gender)!!};
        const values = {!!json_encode($values_gender)!!};
        
        let content = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
        content += '<div><h4 class="text-lg font-semibold mb-4">Gender Distribution</h4>';
        content += '<div class="space-y-3">';
        
        labels.forEach((label, index) => {
            const percentage = ((values[index] / {!!$total_student!!}) * 100).toFixed(1);
            const color = label === 'Male' ? 'text-blue-600' : 'text-pink-600';
            content += `<div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="font-medium">${label}</span>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">${values[index]} students</span>
                    <span class="text-sm font-semibold ${color}">${percentage}%</span>
                </div>
            </div>`;
        });
        
        content += '</div></div>';
        content += '<div class="flex items-center justify-center"><canvas id="modalGenderChart" width="300" height="300"></canvas></div>';
        content += '</div>';
        
        setTimeout(() => {
            const ctx = document.getElementById('modalGenderChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: ['rgba(59, 130, 246, 0.8)', 'rgba(236, 72, 153, 0.8)']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom' } }
                }
            });
        }, 100);
        
        return content;
    }

    function generateAgeDetails() {
        const labels = {!!json_encode($labels_age)!!};
        const values = {!!json_encode($values_age)!!};
        
        let content = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
        content += '<div><h4 class="text-lg font-semibold mb-4">Age Distribution</h4>';
        content += '<div class="space-y-3 max-h-96 overflow-y-auto">';
        
        labels.forEach((label, index) => {
            const percentage = ((values[index] / {!!$total_student!!}) * 100).toFixed(1);
            content += `<div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="font-medium">${label} years</span>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">${values[index]} students</span>
                    <span class="text-sm font-semibold text-green-600">${percentage}%</span>
                </div>
            </div>`;
        });
        
        content += '</div></div>';
        content += '<div class="flex items-center justify-center"><canvas id="modalAgeChart" width="400" height="300"></canvas></div>';
        content += '</div>';
        
        setTimeout(() => {
            const ctx = document.getElementById('modalAgeChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Students',
                        data: values,
                        backgroundColor: 'rgba(16, 185, 129, 0.8)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }, 100);
        
        return content;
    }

    function generateMonthlyDetails() {
        const labels = {!!json_encode($data_month_labels)!!};
        const values = {!!json_encode($data_month_values)!!};
        
        let content = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
        content += '<div><h4 class="text-lg font-semibold mb-4">Monthly Trends</h4>';
        content += '<div class="space-y-3">';
        
        labels.forEach((label, index) => {
            content += `<div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="font-medium">${label}</span>
                <span class="text-sm font-semibold text-orange-600">${values[index]} applicants</span>
            </div>`;
        });
        
        content += '</div></div>';
        content += '<div class="flex items-center justify-center"><canvas id="modalMonthlyChart" width="400" height="300"></canvas></div>';
        content += '</div>';
        
        setTimeout(() => {
            const ctx = document.getElementById('modalMonthlyChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Applicants',
                        data: values,
                        borderColor: 'rgba(245, 158, 11, 1)',
                        backgroundColor: 'rgba(245, 158, 11, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }, 100);
        
        return content;
    }

    function generateOriginsDetails() {
        const labels = {!!json_encode($origins_labels)!!};
        const values = {!!json_encode($origins_values)!!};
        
        let content = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
        content += '<div><h4 class="text-lg font-semibold mb-4">Regional Distribution</h4>';
        content += '<div class="space-y-3 max-h-96 overflow-y-auto">';
        
        labels.forEach((label, index) => {
            const percentage = ((values[index] / {!!$total_student!!}) * 100).toFixed(1);
            content += `<div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="font-medium">${label}</span>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">${values[index]} students</span>
                    <span class="text-sm font-semibold text-purple-600">${percentage}%</span>
                </div>
            </div>`;
        });
        
        content += '</div></div>';
        content += '<div class="flex items-center justify-center"><canvas id="modalOriginsChart" width="400" height="300"></canvas></div>';
        content += '</div>';
        
        setTimeout(() => {
            const ctx = document.getElementById('modalOriginsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Students',
                        data: values,
                        backgroundColor: 'rgba(139, 92, 246, 0.8)',
                        borderColor: 'rgba(139, 92, 246, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        x: { beginAtZero: true }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }, 100);
        
        return content;
    }

    function generateProvincesDetails() {
        const labels = {!!json_encode($provinces_labels)!!};
        const values = {!!json_encode($provinces_values)!!};
        
        let content = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
        content += '<div><h4 class="text-lg font-semibold mb-4">Provincial Distribution</h4>';
        content += '<div class="space-y-3 max-h-96 overflow-y-auto">';
        
        labels.forEach((label, index) => {
            const percentage = ((values[index] / {!!$total_student!!}) * 100).toFixed(1);
            content += `<div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="font-medium">${label}</span>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">${values[index]} students</span>
                    <span class="text-sm font-semibold text-blue-600">${percentage}%</span>
                </div>
            </div>`;
        });
        
        content += '</div></div>';
        content += '<div class="flex items-center justify-center"><canvas id="modalProvincesChart" width="400" height="300"></canvas></div>';
        content += '</div>';
        
        setTimeout(() => {
            const ctx = document.getElementById('modalProvincesChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Students',
                        data: values,
                        backgroundColor: 'rgba(59, 130, 246, 0.8)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }, 100);
        
        return content;
    }

    function generateCitiesDetails() {
        const labels = {!!json_encode($cities_labels)!!};
        const values = {!!json_encode($cities_values)!!};
        
        let content = '<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">';
        content += '<div><h4 class="text-lg font-semibold mb-4">City Distribution</h4>';
        content += '<div class="space-y-3 max-h-96 overflow-y-auto">';
        
        labels.forEach((label, index) => {
            const percentage = ((values[index] / {!!$total_student!!}) * 100).toFixed(1);
            content += `<div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="font-medium">${label}</span>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600">${values[index]} students</span>
                    <span class="text-sm font-semibold text-green-600">${percentage}%</span>
                </div>
            </div>`;
        });
        
        content += '</div></div>';
        content += '<div class="flex items-center justify-center"><canvas id="modalCitiesChart" width="400" height="300"></canvas></div>';
        content += '</div>';
        
        setTimeout(() => {
            const ctx = document.getElementById('modalCitiesChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Students',
                        data: values,
                        backgroundColor: 'rgba(16, 185, 129, 0.8)',
                        borderColor: 'rgba(16, 185, 129, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        x: { beginAtZero: true }
                    },
                    plugins: { legend: { display: false } }
                }
            });
        }, 100);
        
        return content;
    }

    // Close modal when clicking outside
    document.getElementById('chartModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeChartModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeChartModal();
        }
    });
</script>
@include('partials.footer')
