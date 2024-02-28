document.addEventListener('DOMContentLoaded', function () {
    const searchTable = document.getElementById('table-search');
    
    if (searchTable) {
        var tasksJson = searchTable.getAttribute("data-tasks");
        var tasks = JSON.parse(tasksJson);
        
        new gridjs.Grid({
            columns: [
                { name: 'id', width: '150px' },
                { name: 'title', width: '150px' },
                { name: 'description', width: '250px' },
                { name: 'priority', width: '250px' },
                { name: 'progress percentage', width: '250px' },
                { name: 'deadline', width: '150px' },
                { name: 'status', width: '150px' },
                { name: 'project', width: '150px' },
            ],
            pagination: {
                limit: 5
            },
            search: true,
            data: tasks,
        }).render(searchTable);
    }
});
