<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .task-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            background: #fff;
        }
        .task-item.completed .task-text {
            text-decoration: line-through;
            color: gray;
        }
        .priority-label {
            font-size: 0.8rem;
            padding: 4px 8px;
            border-radius: 10px;
            font-weight: bold;
        }
        .low { background-color: #17a2b8; color: white; }
        .medium { background-color: #ffc107; color: black; }
        .high { background-color: #dc3545; color: white; }
    </style>
</head>
<body class="bg-light">
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">📌 To Do List</div>
        <div class="card-body">
            <div class="list-group" id="taskList">
                <!-- Dummy Tasks -->
                <div class="task-item list-group-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 mark-done">
                    <span class="task-text flex-grow-1">Complete project documentation</span>
                    <span class="priority-label high">High</span>
                    <button class="btn btn-sm btn-warning ms-2 edit-btn">✎</button>
                    <button class="btn btn-sm btn-danger ms-2 delete-btn">✖</button>
                </div>
                <div class="task-item list-group-item d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 mark-done">
                    <span class="task-text flex-grow-1">Fix UI bugs in the app</span>
                    <span class="priority-label medium">Medium</span>
                    <button class="btn btn-sm btn-warning ms-2 edit-btn">✎</button>
                    <button class="btn btn-sm btn-danger ms-2 delete-btn">✖</button>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">➕ Add Task</button>
        </div>
    </div>
</div>
<!-- Modal for Adding/Editing Task -->
<div class="modal fade" id="taskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add / Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="taskText" class="form-control mb-2" placeholder="Task name">
                <select id="taskPriority" class="form-select">
                    <option value="low">Low Priority</option>
                    <option value="medium">Medium Priority</option>
                    <option value="high">High Priority</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveTask">Save Task</button>
            </div>
        </div>
    </div>
</div>
<script>
    let editMode = null;
    document.addEventListener("DOMContentLoaded", function () {
        const taskList = document.getElementById("taskList");
        const saveTaskBtn = document.getElementById("saveTask");

        function addTaskEvents(taskItem) {
            taskItem.querySelector(".mark-done").addEventListener("change", function () {
                taskItem.classList.toggle("completed");
            });
            taskItem.querySelector(".delete-btn").addEventListener("click", function () {
                taskItem.remove();
            });
            taskItem.querySelector(".edit-btn").addEventListener("click", function () {
                document.getElementById("taskText").value = taskItem.querySelector(".task-text").textContent;
                document.getElementById("taskPriority").value = taskItem.querySelector(".priority-label").classList[1];
                editMode = taskItem;
                new bootstrap.Modal(document.getElementById("taskModal")).show();
            });
        }
        
        saveTaskBtn.addEventListener("click", function () {
            let taskText = document.getElementById("taskText").value;
            let priority = document.getElementById("taskPriority").value;
            if (taskText.trim() === "") return;
            let priorityClass = priority === "low" ? "low" : priority === "medium" ? "medium" : "high";
            let priorityLabel = priority.charAt(0).toUpperCase() + priority.slice(1);
            
            if (editMode) {
                editMode.querySelector(".task-text").textContent = taskText;
                editMode.querySelector(".priority-label").textContent = priorityLabel;
                editMode.querySelector(".priority-label").className = `priority-label ${priorityClass}`;
                editMode = null;
            } else {
                let taskItem = document.createElement("div");
                taskItem.className = "task-item list-group-item d-flex align-items-center";
                taskItem.innerHTML = `
                    <input type="checkbox" class="form-check-input me-2 mark-done">
                    <span class="task-text flex-grow-1">${taskText}</span>
                    <span class="priority-label ${priorityClass}">${priorityLabel}</span>
                    <button class="btn btn-sm btn-warning ms-2 edit-btn">✎</button>
                    <button class="btn btn-sm btn-danger ms-2 delete-btn">✖</button>
                `;
                taskList.appendChild(taskItem);
                addTaskEvents(taskItem);
            }
            document.getElementById("taskText").value = "";
            document.getElementById("taskPriority").value = "low";
            document.querySelector(".modal .btn-close").click();
        });
        
        document.querySelectorAll(".task-item").forEach(addTaskEvents);
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
