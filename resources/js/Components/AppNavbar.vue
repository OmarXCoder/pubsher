<template>
    <nav class="app-navbar navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pubsher</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#siteNavbarContent"
                aria-controls="siteNavbarContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="siteNavbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-4 active" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4">TOPICS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4" href="#">MY FEED</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-4">MY WALL</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link class="nav-link px-3" href="/posts/create">
                            <i class="fas fa-lg fa-plus"></i>
                        </Link>
                    </li>

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link px-3 dropdown-toggle"
                            href="#"
                            id="userDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <img class="avatar avatar--xs" :src="$page.props.auth.user.avatar" alt="" />
                            <strong class="me-1">
                                {{ $page.props.auth.user.name }}
                            </strong>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <Link href="/profile" class="dropdown-item">
                                <i class="fad fa-fw fa-user me-2"></i>
                                <span>Profile</span>
                            </Link>
                            <hr class="dropdown-divider" />
                            <Link class="dropdown-item" href="/logout" method="post" as="button">
                                <i class="fad fa-fw fa-lock-open me-2"></i>
                                <span>Logout</span>
                            </Link>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
