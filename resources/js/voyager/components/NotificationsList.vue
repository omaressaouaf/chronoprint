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
        <span
            v-if="unreadNotificationsLength"
            class="badge notification-badge"
            >{{ unreadNotificationsLength }}</span
        >
        <h3>
            <i class="glyphicon glyphicon-bell notification-toggle-icon"></i>
        </h3>
    </a>
    <ul
        class="dropdown-menu notifications-dropdowm-menu pt-3 has-cool-scrollbar"
        style="max-height: 400px; overflow-y: auto"
        aria-labelledby="dropdownMenuDivider"
    >
        <template v-if="notifications.length">
            <div class="mb-4">
                <button
                    @click="deleteNotifications"
                    class="btn btn-link btn-delete-notifications"
                >
                    <small class="text-danger">Supprimer</small>
                </button>
            </div>
            <li
                v-for="notification in notifications"
                :key="notification.id"
                class="pt-2 pb-0 mb-0"
                :class="{ 'bg-gray': !notification.read_at }"
            >
                <a
                    :href="notification.data.url"
                    class="d-flex align-items-center px-4"
                >
                    <div class="bg-primary notification-icon mr-3">
                        <i class="voyager-bell"></i>
                    </div>
                    <div class="pb-2 notification-content">
                        <small class="text-muted font-weight-bold">
                            {{
                                $filters.formateDateToTimeAgo(
                                    notification.created_at
                                )
                            }}
                        </small>
                        <h6 class="pt-0 mt-2 notification-title">
                            {{ notification.data.message }}
                        </h6>
                    </div>
                </a>
            </li>
        </template>
        <li v-else class="dropdown-item px-4 pb-4 pt-2 text-center">
            <span class="h4">Aucune notification</span>
        </li>
    </ul>
</template>

<script>
import axios from "axios";

export default {
    props: {
        notificationsList: Array,
        authUser: Object,
        appName: String,
    },
    data() {
        return {
            notifications: this.notificationsList,
            unreadNotificationsLength: 0,
        };
    },
    methods: {
        revertToDefaultDocumentTitle() {
            const oldNotificationsTemplate = `(${this.unreadNotificationsLength})`;

            if (document.title.indexOf(oldNotificationsTemplate) != -1) {
                document.title = document.title.replace(
                    oldNotificationsTemplate,
                    ""
                );
            }
        },
        increaseDocumentTileCount() {
            this.revertToDefaultDocumentTitle();

            document.title = `(${this.unreadNotificationsLength + 1}) ${
                document.title
            }`;
        },
        deleteNotifications() {
            this.loading = true;

            axios
                .delete("/admin/notifications")
                .then((res) => {
                    this.notifications = [];
                    this.revertToDefaultDocumentTitle();
                    this.unreadNotificationsLength = 0;
                })
                .catch((err) => {})
                .finally(() => {
                    this.loading = false;
                });
        },
        markNotifications() {
            axios
                .put("/admin/notifications")
                .then(() => {
                    this.revertToDefaultDocumentTitle();

                    this.notifications = this.notifications.map(
                        (notification) => {
                            return { ...notification, read_at: Date.now() };
                        }
                    );
                    this.unreadNotificationsLength = 0;
                })
                .catch((err) => {});
        },
        async handleBroadcast(notification) {
            const newNotification = {
                id: notification.id,
                data: {
                    url: notification.url,
                    message: notification.message,
                },
                read_at: null,
            };

            this.notifications.unshift(newNotification);
            this.increaseDocumentTileCount();
            this.unreadNotificationsLength++;

            new Audio("/storage/notification.mp3").play();
            if ("Notification" in window) {
                const permission = await Notification.requestPermission();
                if (permission === "granted") {
                    new Notification(this.appName, {
                        body: notification.message,
                        silent: true,
                    });
                }
            }
        },
    },
    mounted() {
        // Set default unreadNotificationsLength
        const unreadNotifications = this.notifications.filter(
            (notification) => {
                return notification.read_at == null;
            }
        );
        this.unreadNotificationsLength = unreadNotifications.length;

        // Monitor any broadcast notifications using echo
        Echo.private(`App.Models.User.${this.authUser.id}`).notification(
            this.handleBroadcast
        );

        // Listen for dropdown close event
        $("#notifications-dropdown").on("hide.bs.dropdown", () => {
            if (this.unreadNotificationsLength) {
                this.markNotifications();
            }
        });
    },
};
</script>
