Vue.component('tasks', {

    template: '#tasks-template',

    data: function() {

        return {
            list: []
        };

    },

    created: function() {

        $.getJSON('api/tasks/list', function(tasks) {
            this.list = tasks;
        }.bind(this));

    },

    methods: {

        add: function(task) {

            var name = $('input#new-task').val();
            if (name != '') {

                $.ajax({
                    method: 'POST',
                    url: "/api/task/add/",
                    data: {
                        name: $('input#new-task').val(),
                    }
                }).done(function(msg) {
                    alert("A new task has been added!");
                });

                $('input#new-task').val('');

                $.getJSON('api/tasks/list', function(tasks) {
                    this.list = tasks;
                }.bind(this));

            } else {

                alert('Write something..');

            }

        },

        update: function(task) {

            $.ajax({
                method: 'POST',
                url: "/api/task/update/",
                data: {
                    id: task.id,
                    name: $('input#task-' + task.id).val(),
                }
            }).done(function(msg) {
                alert("Task ID " + task.id + " successfully updated!");
            });

        },

        delete: function(task) {

            var x = confirm("Are you sure you want to delete?");
            if (x) {
                $.ajax({
                    url: "/api/task/delete/" + task.id
                }).done(function(msg) {
                    alert("Task ID " + task.id + " successfully deleted!");
                });

                this.list.$remove(task);

            }

        }


    }

});

new Vue({
    el: 'body',
});
