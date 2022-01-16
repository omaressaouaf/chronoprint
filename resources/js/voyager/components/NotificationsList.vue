<template>
        <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdown"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <h3>
                <i class="voyager-bell"></i>
            </h3>
        </a>
        <ul
            class="dropdown-menu notifications-dropdowm-menu pt-3"
            aria-labelledby="dropdownMenuDivider"
        >
            <div class="mb-3">
                <button class="btn btn-link btn-delete-notifications">
                    <small class="text-danger">Supprimer</small>
                </button>
            </div>
            <li class="mb-4">
                <a href="#" class="d-flex align-items-center px-4 py-1">
                    <div class="bg-primary notification-icon mr-3">
                        <i class="voyager-bell"></i>
                    </div>
                    <div class="pb-2 notification-content">
                        <small class="text-muted font-weight-bold"
                            >2 month ago</small
                        >
                        <h6 class="pt-0 mt-2 notification-title">
                            A new order has been shipped
                        </h6>
                    </div>
                </a>
            </li>
            <li class="mb-4">
                <a href="#" class="d-flex align-items-center px-4 py-1">
                    <div class="bg-primary notification-icon mr-3">
                        <i class="voyager-bell"></i>
                    </div>
                    <div class="pb-2 notification-content">
                        <small class="text-muted font-weight-bold"
                            >2 month ago</small
                        >
                        <h6 class="pt-0 mt-2 notification-title">
                            A new order has been shipped
                        </h6>
                    </div>
                </a>
            </li>
            <li class="mb-4">
                <a href="#" class="d-flex align-items-center px-4 py-1">
                    <div class="bg-primary notification-icon mr-3">
                        <i class="voyager-bell"></i>
                    </div>
                    <div class="pb-2 notification-content">
                        <small class="text-muted font-weight-bold"
                            >2 month ago</small
                        >
                        <h6 class="pt-0 mt-2 notification-title">
                            A new order has been shipped
                        </h6>
                    </div>
                </a>
            </li>
        </ul>
</template>

<script>
export default {};
</script>
