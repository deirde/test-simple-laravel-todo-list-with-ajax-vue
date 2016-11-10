@extends('layouts.app')

@section('content')

    <div class="container">
        <tasks></tasks>
    </div>

    <template id="tasks-template">

        <div class="panel panel-default">

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                <div class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="new-task" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success"
                                @click="add(task)">
                                <i class="fa fa-btn fa-plus"></i>Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item" v-for="task in list">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input id="task-@{{ task.id }}" value="@{{ task.name }}" style="width:70%;border:1px solid #eee;padding:2px 4px">
                <button type="submit" class="btn btn-info"
                    @click="update(task)">
                    <i class="fa fa-btn fa-pencil"></i>Update
                </button>
                <button type="submit" class="btn btn-danger"
                    @click="delete(task)">
                    <i class="fa fa-btn fa-trash"></i>Delete
                </button>
            </li>
        </ul>

    </template>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.8/vue.js"></script>
    <script type="text/javascript" src="/main.js"></script>

@endsection
