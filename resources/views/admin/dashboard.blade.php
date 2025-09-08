@extends(adminTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Dashboard')}}</title>
@endsection @push('css')
<style type="text/css"></style>
@endpush @section('contents')
<div class="page">
    <div class="page-inner">
        <header class="page-title-bar">
            <div class="d-flex justify-content-between">
                <h1 class="page-title">Dashboard</h1>
            </div>
        </header>
        <div class="page-section">
            <div class="section-block">
                <div class="metric-row">
                    <div class="col-lg-12">
                        <div class="metric-row metric-flush">
                            <div class="col">
                                <a href="user-teams.html" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">Teams</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="oi oi-people"></i></sub> <span class="value">8</span>
                                    </p>
                                </a>
                            </div>
                            <div class="col">
                                <a href="user-projects.html" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">Projects</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="oi oi-fork"></i></sub> <span class="value">12</span>
                                    </p>
                                </a>
                            </div>
                            <div class="col">
                                <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">Active Tasks</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="fa fa-tasks"></i></sub> <span class="value">64</span>
                                    </p>
                                </a>
                            </div>
                            <div class="col">
                                <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">Active Tasks</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="fa fa-tasks"></i></sub> <span class="value">64</span>
                                    </p>
                                </a>
                            </div>
                            <div class="col">
                                <a href="user-tasks.html" class="metric metric-bordered align-items-center">
                                    <h2 class="metric-label">Active Tasks</h2>
                                    <p class="metric-value h3">
                                        <sub><i class="fa fa-tasks"></i></sub> <span class="value">64</span>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@push('js')
<script>
</script>
@endpush