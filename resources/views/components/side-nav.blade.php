<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #FFC39B;
            max-width: 240px;
            min-width: 240px;
            height: 100vh;
            display: flex;
            overflow: hidden;
            flex-direction: column;
            /* Change to column layout */
        }

        .nav-link {
            color: #49454F;
            height: 42px;
            display: flex;
            align-items: center;
            /* Keep this for vertical centering */
            justify-content: start;
            /* Change alignment to left */
            padding-left: 12px;
            padding-right: 24px;
            text-align: left;
            margin-bottom: 8px;
        }

        .nav-link.active,
        .nav-link:hover {
            background-color: #FE8E43;
            border-radius: 5px;
        }

        img {
            height: 24px;
            width: 24px;
            margin-right: 8px;
        }

        .nav-item {
            width: 200px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light">
        <div class="container">
            <a href="companydashboard" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('icons/tsikot tracker.svg') }}" alt="Company Logo"
                    style="width: 180px; height: 80px">
            </a>

            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a href="companydashboard" class="nav-link {{ Request::is('companydashboard') ? 'active' : '' }}">
                        <img src="{{ asset('icons/dashboard.svg') }}"> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="record" class="nav-link {{ Request::is('record') ? 'active' : '' }}">
                        <img src="{{ asset('icons/record.svg') }}"> Records
                    </a>
                </li>
                <li class="nav-item">
                    <a href="analytics" class="nav-link {{ Request::is('analytics') ? 'active' : '' }}">
                        <img src="{{ asset('icons/analytics.svg') }}"> Analytics
                    </a>
                </li>
                <li class="nav-item">
                    <a href="offers" class="nav-link {{ Request::is('offers') ? 'active' : '' }}">
                        <img src="{{ asset('icons/product.svg') }}"> Offers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="employees" class="nav-link  {{ Request::is('employees') ? 'active' : '' }}">
                        <img src="{{ asset('icons/employee.svg') }}"> Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="customers" class="nav-link {{ Request::is('customers') ? 'active' : '' }}">
                        <img src="{{ asset('icons/customers.svg') }}"> Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="settings" class="nav-link {{ Request::is('settings') ? 'active' : '' }}">
                        <img src="{{ asset('icons/customers.svg') }}"> Settings
                    </a>
                </li>
            </ul>

            <div class="user-profile" style="display: none;">
                <p class="username"></p>
                <a href="/logout" class="btn btn-secondary">Logout</a>
            </div>
            <div class="login-area" style="display: none;">
                <a href="/dashboard" class="btn btn-primary">Login</a>
            </div>

        </div>
    </nav>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

    <script>
    window.addEventListener('DOMContentLoaded', () => {
        const userProfile = document.querySelector('.user-profile');
        const username = userProfile.querySelector('.username');
        const loginArea = document.querySelector('.login-area');

        async function fetchUserData() {  // Using async/await for cleaner error handling 
            try {
                const response = await fetch('/api/user');
                const data = await response.json();

                if (response.ok) { // Check for success status code
                    username.textContent = data.username; 
                    userProfile.style.display = 'block';
                } else {
                    loginArea.style.display = 'block';
                }            
            } catch (error) {
                console.error('Error fetching user:', error);
                loginArea.style.display = 'block'; // Show login on error
            }
        }

        fetchUserData(); // Call the function to start the process
    });
</script>
</html>