<template>
    <div class="h-screen relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div
                class="
                    relative
                    z-10
                    pb-8
                    bg-white
                    sm:pb-16
                    md:pb-20
                    lg:max-w-2xl
                    lg:w-full
                    lg:pb-28
                    xl:pb-32
                "
            >
                <svg
                    class="
                        h-screen
                        block
                        absolute
                        right-0
                        inset-y-0
                        w-48
                        text-white
                        transform
                        translate-x-1/2
                    "
                    fill="currentColor"
                    viewBox="0 0 100 100"
                    preserveAspectRatio="none"
                    aria-hidden="true"
                >
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <div>
                    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                        <nav
                            class="
                                relative
                                flex
                                items-center
                                justify-between
                                sm:h-10
                                lg:justify-start
                            "
                            aria-label="Global"
                        >
                            <img
                                src="/images/shutter.png"
                                alt="logo"
                                class="h-8"
                            />
                            <!-- <img
                                class="h-8 w-auto sm:h-10"
                                src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                            /> -->

                            <div class="block md:ml-10 md:pr-4 md:space-x-8">
                                <a
                                    v-if="$page.props.user"
                                    :href="route('events.index')"
                                    class="
                                        font-medium
                                        text-gray-500
                                        hover:text-gray-900
                                    "
                                >
                                    Events
                                </a>

                                <a
                                    v-if="!$page.props.user"
                                    :href="route('register')"
                                    class="
                                        mx-2
                                        font-medium
                                        text-gray-500
                                        hover:text-gray-900
                                    "
                                >
                                    Register
                                </a>

                                <a
                                    v-if="!$page.props.user"
                                    :href="route('login')"
                                    class="
                                        font-medium
                                        text-indigo-600
                                        hover:text-indigo-500
                                    "
                                >
                                    Log in
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>

                <main
                    class="
                        mt-10
                        mx-auto
                        max-w-7xl
                        px-4
                        sm:mt-12
                        sm:px-6
                        md:mt-16
                        lg:mt-20
                        lg:px-8
                        xl:mt-28
                    "
                >
                    <div class="sm:text-center lg:text-left">
                        <h1
                            class="
                                text-4xl
                                tracking-tight
                                font-extrabold
                                text-gray-900
                                sm:text-5xl
                                md:text-6xl
                            "
                        >
                            <span class="block xl:inline"
                                >Document all of you adventures with
                            </span>
                            <span class="block text-indigo-600 xl:inline"
                                >Picture Quest</span
                            >
                        </h1>
                        <p
                            class="
                                mt-3
                                text-base text-gray-500
                                sm:mt-5
                                sm:text-lg
                                sm:max-w-xl
                                sm:mx-auto
                                md:mt-5
                                md:text-xl
                                lg:mx-0
                            "
                        >
                            All of you memories, adventures, events and pictures
                            in one single place! With picture quest you can save
                            every picture you want and have it with you anytime
                            any where!
                        </p>
                        <div
                            class="
                                mt-5
                                sm:mt-8
                                sm:flex
                                sm:justify-center
                                lg:justify-start
                            "
                        >
                            <div class="rounded-md shadow">
                                <a
                                    :href="route('login')"
                                    class="
                                        w-full
                                        flex
                                        items-center
                                        justify-center
                                        px-8
                                        py-3
                                        border border-transparent
                                        text-base
                                        font-medium
                                        rounded-md
                                        text-white
                                        bg-indigo-600
                                        hover:bg-indigo-700
                                        md:py-4
                                        md:text-lg
                                        md:px-10
                                    "
                                >
                                    Get started
                                </a>
                            </div>
                        </div>
                        <!-- <div class="mt-5 h-40"></div> -->
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img
                class="
                    h-56
                    w-full
                    object-cover
                    sm:h-72
                    md:h-96
                    lg:w-full
                    lg:h-full
                "
                src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=ilDT4a4YU8&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                alt=""
            />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
};
</script>
