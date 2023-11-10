<x-layout>

    {{-- content --}}
    <x-slot name="content">

        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50 " style="background-image:url({{ asset('images/page-background.jpg')}}) ;">
            <x-page-title>
                About
                <x-slot name="introText">
                    On this page you can learn all about the Organ collection platform and how to use it.
                    It also contains references to the technologies/sources/inspiration used to build the platform.
                </x-slot>
            </x-page-title>
            <div class="w-full flex justify-center pb-20">
                <x-button-default>
                    Go to the contact form
                    <x-slot name='href'>"/contact"</x-slot>
                </x-button-default>
            </div>
        </div>

        {{-- main screen --}}
        <div class="flex justify-center  mt-10">
            <div class="flex flex-col  w-3/5 bg-white rounded-lg">


                <!-- Main Content Section -->
                <div class="container mx-auto my-8 p-4 bg-white">

                    <!-- Mission Section -->
                    <section class="w-3/5 py-5">
                        <h2
                            class="mb-2 uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Our Mission</h2>
                        <p class="mb-6">
                            At Organ Collection Platform, our mission is to transform medical research by fostering
                            collaboration within the global scientific community. We're pioneering a platform where
                            researchers can seamlessly share surplus animals and lab organs, propelling scientific
                            progress to new heights while actively contributing to the principles of Replacement,
                            Reduction, and Refinement (3R).
                        </p>
                    </section>

                    <!-- Why Organ Collection Platform Section -->
                    <section class="w-3/5 py-5 ml-auto">
                        <h2
                            class="mb-2   uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Why Organ Collection Platform?</h2>
                        <p class="mb-6  ">
                            In the ever-evolving landscape of medical research, collaboration and resource-sharing
                            are paramount. Organ Collection Platform is meticulously designed to break down
                            barriers, connecting researchers worldwide. By facilitating the exchange of surplus
                            animals and lab organs, we aim to expedite breakthroughs, minimize redundancies, and
                            amplify the impact of scientific discoveries—all while adhering to the ethical
                            principles of the 3R model.
                        </p>
                    </section>

                    <!-- Advancing the 3R Principle Section -->
                    <section class="w-3/5 py-5">
                        <h2
                            class="mb-2 uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Advancing the 3R Principle</h2>
                        <ul class="list-disc ml-8 mb-6">
                            <li>Replacement: Finding alternatives to the use of animals in research.</li>
                            <li>Reduction: Minimizing the number of animals used in experiments.</li>
                            <li>Refinement: Enhancing experimental techniques to minimize potential pain and
                                distress.</li>
                        </ul>
                    </section>

                    <!-- Powered by Cutting-Edge Technologies Section -->
                    <section class="w-3/5 py-5 ml-auto">
                        <h2
                            class="mb-2   uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Powered by Cutting-Edge Technologies</h2>
                        <!-- Add the information about technologies used with appropriate styling -->
                        <p class="mb-6  ">
                            Footer Design inspired by <a
                                href="https://flowbite.com/blocks/application/dashboard-footer/"
                                class="underline">Flowbite</a><br>
                            Header Design influenced by <a
                                href="https://github.com/laracasts/Laravel-From-Scratch-HTML-CSS"
                                class="underline">Laracasts</a><br>
                            JavaScript Magic with <a href="https://alpinejs.dev/" class="underline">Alpine.js</a><br>
                            Iconic Touch using <a href="https://fontawesome.com/" class="underline">Font
                                Awesome</a><br>
                            Newsletter Hub powered by <a href="https://mailchimp.com/"
                                class="underline">Mailchimp</a><br>
                            Smooth Communication with <a href="https://www.mailgun.com/" class="underline">Mailgun</a>
                        </p>
                    </section>

                    <!-- Key Features Section -->
                    <section class="w-3/5 py-5 ">
                        <h2
                            class="mb-2  uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Key Features</h2>
                        <!-- Add your key features here using a similar structure -->
                        <ul class="list-disc  ml-8 mb-6">
                            <li>Effortless Listings: Researchers can effortlessly announce surplus lab animals or
                                available lab organs.</li>
                            <li>Global Network: Connect with researchers globally, expanding your network.</li>
                            <li>Secure Collaboration: Our platform provides a secure environment for researchers to
                                communicate and coordinate.</li>
                        </ul>
                    </section>



                    <!-- Crafted with Expert Guidance Section -->
                    <section class="w-3/5 py-5 ml-auto">
                        <h2
                            class="mb-2   uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Crafted with Expert Guidance</h2>
                        <!-- Add information about content assistance with appropriate styling -->
                        <p class="mb-6  ">
                            Content Assistance: Developed with insights from OpenAI's language model, ensuring clear
                            communication and engaging content.
                        </p>
                    </section>

                    <!-- Join Us Section -->
                    <section class="w-3/5 py-5">
                        <h2
                            class="mb-2 uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Join Us in Shaping the Future of Collaboration</h2>
                        <!-- Add information about joining the platform with appropriate styling -->
                        <p class="mb-6">
                            Whether you're a seasoned researcher or just starting your scientific journey, Organ
                            Collection Platform invites you to join our vibrant community. Let's collectively build
                            a future where collaboration knows no boundaries, every surplus resource contributes to
                            groundbreaking discoveries, and we actively advance the 3R principle.
                        </p>
                    </section>

                    <!-- Contact Us Section -->
                    <section class="w-3/5 py-5 ml-auto">
                        <h2
                            class="mb-2   uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">
                            Contact Us</h2>
                        <!-- Add information about contacting the platform with appropriate styling -->
                        <p class="mb-6  ">
                            Have questions or suggestions? We'd love to hear from you. Reach out to us at <a
                                href="mailto:your@email.com" class="underline">your@email.com</a>.
                        </p>
                    </section>

                </div>




            </div>

        </div>



    </x-slot>

</x-layout>
