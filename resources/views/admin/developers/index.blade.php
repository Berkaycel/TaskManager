@extends('admin.layout.master')

@section('styles')
    <style>
        .center{
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Developers</h4>
                    <p class="card-description">
                        Developers and their weekly tasks were listed below.
                    </p>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Developer</th>
                                    <th>Hourly Work Capacity</th>
                                    <th>Weekly Tasks</th>
                                    <th>Total Workload</th>
                                    <th>Assignment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('tasks.getAll') }}', 
                method: 'GET',
                success: function(response) {
                    loadTable(response);
                },
                error: function() {
                    alert("An error occurred while loading data!");
                }
            });
        });

        function loadTable(data) {
            var tableBody = $('table tbody');
            tableBody.empty();

            data.forEach(function(developer) {
                var totalWorkload = developer.weekly_tasks.reduce(function(acc, task) {
                    return acc + task.task_development_time;
                }, 0);

                var tasksList = `<ul style="list-style: auto;">`;
                developer.weekly_tasks.forEach(function(task) {
                    tasksList += `<li><strong>Task ID:</strong> ${task.id} | <strong>Difficulty Level:</strong> ${task.difficulty_level} | 
                        <strong>Estimated Time:</strong> ${task.task_development_time} Hours</li>`;
                });
                tasksList += `</ul>`;

                var row = `<tr>
                        <td>${developer.name}</td>
                        <td class="center"><strong>${developer.power}</strong></td>
                        <td>${tasksList}</td> 
                        <td class="center"> ${totalWorkload.toFixed(2)} hours</td>
                        <td class="center">${new Date(developer.created_at).toLocaleDateString()}</td>
                    </tr>`;

                tableBody.append(row);
            });
        }
    </script>
@endsection
