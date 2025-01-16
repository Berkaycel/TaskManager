
# Task Manager

This project is designed to allocate development tasks, obtained from third-party services, to developers within the system, focusing on weekly or sprint-specific assignments. The allocation process ensures a balanced distribution of work between the most productive developers and those with lighter workloads, optimizing task completion. The primary objective is to assign tasks in a way that minimizes the total completion time for all tasks received from the services.


## Technologies

This project leverages modern development technologies and architectural principles to ensure efficiency, scalability, and maintainability. The key technologies and design principles used in this project are as follows:

**Technologies Used:**
   - **Laravel Framework (PHP):** Utilized for building the backend, ensuring modular and structured development with built-in support for routing, database migrations, and task scheduling.
   - **MySQL Database:** Employed to store and manage developer and task data efficiently while maintaining relational integrity.
   - **Bootstrap (Frontend Template):** The project utilizes a pre-built Bootstrap template for the frontend, ensuring a responsive and user-friendly interface. This allows for quick and efficient UI development with ready-made components and a mobile-first design approach.

**Development Principles and Practices:**
   - **SOLID Principles:** The project follows SOLID principles to ensure maintainability, scalability, and readability. This approach creates a flexible and robust architecture capable of adapting to future changes.
   - **Task Assignment Strategy:** Tasks are dynamically assigned to developers based on performance metrics and workload distribution to maintain balance across the team.
   - **Efficient Task Scheduling:** The project leverages Laravel's task scheduler for recurring tasks, ensuring the timely fetching of tasks from third-party services and the efficient rebalancing of workloads.
   - **Asynchronous Processing:** Although RabbitMQ is not yet integrated, the architecture is designed to support future asynchronous task processing, enhancing reliability and fault tolerance.
   - **Scalability:** The system is built to handle an increasing number of tasks and developers without significant performance degradation. Its modular structure ensures that it can be easily extended as the system grows.

**Additional Features:**
   - **Automated Scheduling:** The project uses Laravel's task scheduler to manage recurring actions, such as fetching tasks from third-party services and rebalancing workloads.

By combining these technologies and practices, the project offers a robust and efficient solution for task allocation and workload management.
