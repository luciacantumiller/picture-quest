<template>
    <app-layout>
        <div
            class="
                relative
                bg-gray-50
                pt-10
                pb-20
                px-4
                sm:px-6
                lg:pb-28
                lg:px-8
            "
        >
            <div class="relative max-w-7xl mx-auto">
                <div
                    v-if="eventUpdated"
                    class="mb-6 p-4 rounded border-green-600 border block"
                >
                    <p class="mt-1 text-base text-green-600">
                        Adventure updated!
                    </p>
                </div>
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="
                                        text-lg
                                        font-medium
                                        leading-6
                                        text-gray-900
                                    "
                                >
                                    Edit adventure
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Update the information about your adventure
                                    here!
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form method="POST" @submit.prevent="submit">
                                <div
                                    class="
                                        shadow
                                        sm:rounded-md
                                        sm:overflow-hidden
                                    "
                                >
                                    <div
                                        class="
                                            px-4
                                            py-5
                                            bg-white
                                            space-y-6
                                            sm:p-6
                                        "
                                    >
                                        <div>
                                            <label
                                                for="title"
                                                class="
                                                    block
                                                    text-sm
                                                    font-medium
                                                    text-gray-700
                                                "
                                            >
                                                Title
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    id="title"
                                                    v-model="form.title"
                                                    type="text"
                                                    class="
                                                        shadow-sm
                                                        focus:ring-indigo-500
                                                        focus:border-indigo-500
                                                        mt-1
                                                        block
                                                        w-full
                                                        sm:text-sm
                                                        border-gray-300
                                                        rounded-md
                                                    "
                                                />
                                            </div>
                                            <p
                                                v-if="'title' in form.errors"
                                                class="text-red-600 text-sm"
                                            >
                                                {{ form.errors.title }}
                                            </p>
                                        </div>
                                        <div>
                                            <label
                                                for="date"
                                                class="
                                                    block
                                                    text-sm
                                                    font-medium
                                                    text-gray-700
                                                "
                                            >
                                                Date
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    type="date"
                                                    id="start"
                                                    v-model="form.event_date"
                                                    min="1900-01-01"
                                                    max="2040-12-31"
                                                    class="
                                                        shadow-sm
                                                        focus:ring-indigo-500
                                                        focus:border-indigo-500
                                                        mt-1
                                                        block
                                                        sm:text-sm
                                                        border-gray-300
                                                        rounded-md
                                                    "
                                                />
                                            </div>
                                        </div>

                                        <div>
                                            <label
                                                for="about"
                                                class="
                                                    block
                                                    text-sm
                                                    font-medium
                                                    text-gray-700
                                                "
                                            >
                                                About
                                            </label>
                                            <div class="mt-1">
                                                <textarea
                                                    v-model="form.about"
                                                    id="about"
                                                    rows="3"
                                                    class="
                                                        shadow-sm
                                                        focus:ring-indigo-500
                                                        focus:border-indigo-500
                                                        mt-1
                                                        block
                                                        w-full
                                                        sm:text-sm
                                                        border-gray-300
                                                        rounded-md
                                                    "
                                                ></textarea>
                                            </div>
                                            <p
                                                class="
                                                    mt-2
                                                    text-sm text-gray-500
                                                "
                                            >
                                                Write a description about you
                                                adventure!
                                            </p>
                                        </div>

                                        <div v-show="!form.file">
                                            <p
                                                class="
                                                    block
                                                    text-sm
                                                    font-medium
                                                    text-gray-700
                                                    mb-1
                                                "
                                            >
                                                Picture
                                            </p>
                                            <img
                                                :src="event.data.file"
                                                alt=""
                                            />
                                        </div>
                                        <!-- <div
                                            class="
                                                mx-4
                                                max-w-lg
                                                flex
                                                justify-center
                                                px-6
                                                pt-5
                                                pb-6
                                                border-2
                                                border-gray-300
                                                border-dashed
                                                rounded-md
                                            "
                                        >
                                            <div class="space-y-1 text-center">
                                                <svg
                                                    class="
                                                        mx-auto
                                                        h-12
                                                        w-12
                                                        text-gray-400
                                                    "
                                                    stroke="currentColor"
                                                    fill="none"
                                                    viewBox="0 0 48 48"
                                                    aria-hidden="true"
                                                >
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    ></path>
                                                </svg>
                                                <div
                                                    class="
                                                        flex
                                                        justify-center
                                                        text-sm text-gray-600
                                                    "
                                                >
                                                    <label
                                                        for="file-upload"
                                                        class="
                                                            flex flex-col
                                                            justify-center
                                                            text-center
                                                            relative
                                                            cursor-pointer
                                                            bg-white
                                                            rounded-md
                                                            font-medium
                                                            text-light-blue-600
                                                            hover:text-light-blue-500
                                                            focus-within:outline-none
                                                            focus-within:ring-2
                                                            focus-within:ring-offset-2
                                                            focus-within:ring-light-blue-500
                                                        "
                                                    >
                                                        <p
                                                            class="w-full"
                                                            v-if="form.file"
                                                        >
                                                            {{ form.file.name }}
                                                        </p>
                                                        <p class="">
                                                            Cargar Archivo
                                                        </p>
                                                        <input
                                                            @input="
                                                                form.file =
                                                                    $event.target.files[0]
                                                            "
                                                            id="file-upload"
                                                            name="file-upload"
                                                            type="file"
                                                            class="sr-only"
                                                            accept="image/*"
                                                        />
                                                    </label>
                                                </div>
                                                <p
                                                    class="
                                                        text-xs text-gray-500
                                                    "
                                                >
                                                    PNG o JPG hasta 10MB
                                                </p>
                                            </div>
                                        </div>

                                        <p
                                            v-if="'file' in form.errors"
                                            class="mx-4 text-red-600 text-sm"
                                        >
                                            {{ form.errors.file }}
                                        </p> -->
                                    </div>
                                    <div
                                        class="
                                            space-x-2
                                            px-4
                                            py-3
                                            bg-gray-50
                                            text-right
                                            sm:px-6
                                        "
                                    >
                                        <button
                                            type="button"
                                            @click="deleteEvent"
                                            class="
                                                inline-flex
                                                justify-center
                                                py-2
                                                px-4
                                                border
                                                shadow-sm
                                                text-sm
                                                font-medium
                                                rounded-md
                                                text-red-600
                                                border-red-600
                                                hover:bg-red-300
                                                focus:outline-none
                                                focus:ring-2 focus:ring-offset-2
                                                focus:red-indigo-500
                                            "
                                        >
                                            Delete
                                        </button>
                                        <button
                                            type="submit"
                                            class="
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
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
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
    props: ["event"],
    data() {
        return {
            form: this.$inertia.form(
                {
                    _method: "PUT",
                    title: this.event.data.title,
                    event_date: this.event.data.event_date,
                    about: this.event.data.about,
                    file: "",
                },
                { key: "eventCreation" }
            ),
            eventUpdated: false,
        };
    },

    methods: {
        submit() {
            console.log(this.form);
            this.form.put(
                this.route("events.update", {
                    event: this.event.data.id,
                }),
                {
                    preserveScroll: true,
                    onSuccess: (page) => {
                        this.eventUpdated = true;
                    },
                }
            );
        },
        deleteEvent() {
            this.form.delete(
                this.route("events.destroy", {
                    event: this.event.data.id,
                }),
                {
                    preserveScroll: true,
                }
            );
        },
    },
};
</script>
