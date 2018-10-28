
@extends( 'layouts.app' )

@section( 'content' )

    <div class="panel-body">
        
        <!-- タスク投稿フォーム -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-info">
                        投稿        
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if ( count( $tasks ) > 0 ) 
        <div class="panel panel-info">
            <div class="panel-heading">
                現在のタスク
            </div>          
            @foreach ($tasks as $task)
                <tr>
                    <!-- タスク名 -->
                    <td class="table-text">
                        <div>{{ $task->name }}</div>
                    </td>

                    <td>
                        <!-- TODO: 削除ボタン -->
                    </td>
                </tr>
            @endforeach


    @endif      

