<template>
    <app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="relative pb-20 px-4 sm:px-6 lg:pb-28 lg:px-8">
                        <div class="relative max-w-7xl mx-auto">
                            <div class="text-center">
                                <h2
                                    class="
                                        text-3xl
                                        tracking-tight
                                        font-extrabold
                                        text-gray-900
                                        sm:text-4xl
                                    "
                                >
                                    {{ $page.props.user.name }}'s Adventures
                                </h2>
                                <!-- <p
                                    class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4"
                                >
                                    Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Ipsa libero labore natus
                                    atque, ducimus sed.
                                </p> -->
                            </div>
                            <div
                                v-if="events.data.length > 0"
                                class="
                                    mt-12
                                    max-w-lg
                                    mx-auto
                                    grid
                                    gap-5
                                    lg:grid-cols-3
                                    lg:max-w-none
                                "
                            >
                                <div
                                    v-for="event in events.data"
                                    :key="event.id"
                                >
                                    <div>
                                        <a
                                            :href="
                                                route('events.edit', {
                                                    event: event.id,
                                                })
                                            "
                                            class="
                                                flex flex-col
                                                rounded-lg
                                                shadow-lg
                                                overflow-hidden
                                            "
                                        >
                                            <div class="flex-shrink-0">
                                                <img
                                                    class="
                                                        h-48
                                                        w-full
                                                        object-cover
                                                    "
                                                    :src="event.file"
                                                    alt=""
                                                />
                                                <!-- src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixqx=ilDT4a4YU8&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" -->
                                            </div>
                                            <div
                                                class="
                                                    flex-1
                                                    bg-white
                                                    p-6
                                                    flex flex-col
                                                    justify-between
                                                "
                                            >
                                                <div class="flex-1">
                                                    <a
                                                        href="#"
                                                        class="block mt-2"
                                                    >
                                                        <p
                                                            class="
                                                                text-xl
                                                                font-semibold
                                                                text-gray-900
                                                            "
                                                        >
                                                            {{ event.title }}
                                                        </p>
                                                        <p
                                                            class="
                                                                mt-3
                                                                text-base
                                                                text-gray-500
                                                            "
                                                        >
                                                            {{ event.about }}
                                                        </p>
                                                    </a>
                                                </div>
                                                <div
                                                    v-if="event.event_date"
                                                    class="
                                                        mt-6
                                                        flex
                                                        items-center
                                                    "
                                                >
                                                    <div
                                                        class="
                                                            flex
                                                            space-x-1
                                                            text-sm
                                                            text-gray-500
                                                        "
                                                    >
                                                        <time
                                                            datetime="2020-03-16"
                                                        >
                                                            {{
                                                                event.event_date
                                                            }}
                                                        </time>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div
                                v-else
                                class="
                                    mt-8
                                    max-w-lg
                                    mx-auto
                                    lg:max-w-none
                                    flex flex-col
                                    justify-center
                                "
                            >
                                <p
                                    class="
                                        max-w-2xl
                                        mx-auto
                                        text-xl text-gray-500
                                    "
                                >
                                    It is time to start creating new memories
                                    and adventures!
                                </p>
                                <a
                                    :href="route('events.create')"
                                    class="w-full flex justify-center"
                                >
                                    <button
                                        type="button"
                                        class="
                                            mt-2
                                            w-full
                                            max-w-lg
                                            inline-flex
                                            justify-center
                                            py-2
                                            px-4
                                            border border-transparent
                                            shadow-sm
                                            text-sm
                                            font-medium
                                            rounded-md
                                            text-white
                                            bg-indigo-600
                                            hover:bg-indigo-700
                                            focus:outline-none
                                            focus:ring-2
                                            focus:ring-offset-2
                                            focus:ring-indigo-500
                                        "
                                    >
                                        Create Adventure!
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    components: {
        AppLayout,
    },
    props: ["events"],
};
</script>
