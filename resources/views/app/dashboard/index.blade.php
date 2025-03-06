@extends('layouts.app')

@section('content')
<div class="content-wrapper pb-0">
    <!-- Header -->
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h3 class="page-title">Dashboard Overview</h3>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">
                <span class="text-muted mr-2">Welcome,</span>
                <span class="font-weight-bold">{{ auth()->user()->name }}</span>
            </div>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row">
        @foreach($cardStats as $key => $stat)
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $stat['count'] }}</h3>
                                @if(isset($stat['growth']))
                                <p class="text-{{ $stat['growth'] >= 0 ? 'success' : 'danger' }} ml-2 mb-0 font-weight-medium">
                                    {{ $stat['growth'] >= 0 ? '+' : '' }}{{ $stat['growth'] }}%
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-{{ $key == 'total_views' ? 'success' : ($key == 'total_posts' ? 'primary' : ($key == 'new_posts' ? 'info' : 'warning')) }}">
                                <i class="mdi {{ $stat['icon'] }}"></i>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">{{ $stat['label'] }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Charts Row -->


    <!-- Popular Posts Table -->
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">Popular Posts</h4>
                        <a href="{{ route('posts.index') }}" class="btn btn-link">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Views</th>
                                    <th>Author</th>
                                    <th>Published Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularPosts ?? [] as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($post['image']) }}" class="rounded-circle mr-2" 
                                                 style="width: 30px; height: 30px; object-fit: cover;" alt="">
                                            <span>{{ Str::limit($post['title'], 50) }}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-primary">{{ $post['category'] }}</span></td>
                                    <td>{{ $post['views'] }}</td>
                                    <td>{{ $post['author'] }}</td>
                                    <td>{{ $post['date'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">Recent Posts</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Views</th>
                                    <th>Author</th>
                                    <th>Published Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentPosts ?? [] as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($post['image']) }}" class="rounded-circle mr-2" 
                                                 style="width: 30px; height: 30px; object-fit: cover;" alt="">
                                            <span>{{ Str::limit($post['title'], 50) }}</span>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-primary">{{ $post['category'] }}</span></td>
                                    <td>{{ $post['views'] }}</td>
                                    <td>{{ $post['author'] }}</td>
                                    <td>{{ $post['date'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Stats -->
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Statistics</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Posts</th>
                                    <th>Views</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categoryStats ?? [] as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['posts_count'] }}</td>
                                    <td>{{ $category['views'] }}</td>
                                    <td>
                                        <div class="progress" style="height: 6px;">
                                            <div class="progress-bar bg-primary" 
                                                 style="width: {{ $category['percentage'] }}%"></div>
                                        </div>
                                        <small class="text-muted">{{ $category['percentage'] }}%</small>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Post Views Chart
    const postViewsCtx = document.getElementById('postViewsChart').getContext('2d');
    new Chart(postViewsCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartData['labels'] ?? []) !!},
            datasets: [{
                label: 'Post Views',
                data: {!! json_encode($chartData['views'] ?? []) !!},
                borderColor: '#4CAF50',
                tension: 0.3,
                fill: true,
                backgroundColor: 'rgba(76, 175, 80, 0.1)'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true,
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Category Distribution Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(collect($categoryStats)->pluck('name')) !!},
            datasets: [{
                data: {!! json_encode(collect($categoryStats)->pluck('posts_count')) !!},
                backgroundColor: [
                    '#4CAF50', '#2196F3', '#FFC107', '#E91E63', '#9C27B0',
                    '#00BCD4', '#FF5722', '#795548', '#607D8B', '#3F51B5'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endpush

<style>
.icon-box-success,
.icon-box-primary,
.icon-box-info,
.icon-box-warning {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-box-success {
    background: rgba(76, 175, 80, 0.1);
}

.icon-box-success i {
    color: #4CAF50;
}

.icon-box-primary {
    background: rgba(33, 150, 243, 0.1);
}

.icon-box-primary i {
    color: #2196F3;
}

.icon-box-info {
    background: rgba(0, 188, 212, 0.1);
}

.icon-box-info i {
    color: #00BCD4;
}

.icon-box-warning {
    background: rgba(255, 193, 7, 0.1);
}

.icon-box-warning i {
    color: #FFC107;
}

.card {
    border: none;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.table-hover tbody tr:hover {
    background-color: rgba(0,0,0,0.02);
}

.badge {
    padding: 5px 10px;
    border-radius: 4px;
}

.mdi {
    font-size: 20px;
}

.progress {
    background-color: rgba(0,0,0,0.05);
    margin-top: 4px;
    border-radius: 3px;
}

.progress-bar {
    transition: width 0.6s ease;
}

.table td {
    vertical-align: middle;
}
</style>
@endsection