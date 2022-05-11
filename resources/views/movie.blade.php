<x-guest-layout>
    <div class="container mx-auto py-12 grow px-4 md:px-0">
        <div class="flex flex-col md:grid grid-cols-2 gap-8">
            <div class="flex items-center justify-center">
                <img class="h-full md:max-h-96"
                     src="https://imdb-api.com/images/original/MV5BMDdmMTBiNTYtMDIzNi00NGVlLWIzMDYtZTk3MTQ3NGQxZGEwXkEyXkFqcGdeQXVyMzMwOTU5MDk@._V1_Ratio0.6716_AL_.jpg"
                     alt="">
            </div>
            <div class="flex gap-8 flex-col">
                <div>
                    <h3 class="font-semibold mb-2 md:mb-4">Title</h3>
                    <h1>The Batman</h1>
                </div>
                <div>
                    <h3 class="font-semibold mb-2 md:mb-4">Synopsis</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed justo ac lacus faucibus pharetra eu quis eros. Nulla suscipit tempus turpis, dapibus finibus sapien vestibulum tincidunt. Integer gravida, nisi quis auctor dictum, dolor ante accumsan sem, sit amet elementum dui quam vel arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam nunc neque, tristique vel augue in, pellentesque feugiat nunc. Praesent consectetur tincidunt augue nec euismod. Nam porttitor tortor et convallis varius. Nullam non nisl non ligula mattis ullamcorper et non quam.

                        Nulla facilisi. Duis urna nisi, dictum fermentum finibus a, gravida a nisl. Sed quis est vehicula, cursus sem sit amet, placerat diam. Nam cursus ex quam, sit amet sollicitudin justo finibus quis. Morbi luctus at leo non congue. Nullam iaculis, neque nec aliquam mattis, lorem augue vehicula risus, eget lobortis ante neque elementum nisi. Mauris vitae diam neque. Proin et convallis massa.

                        Phasellus porta libero efficitur consectetur aliquet. Curabitur convallis quam leo, ac mattis est mollis et. Nullam enim quam, sollicitudin vitae aliquet sed, molestie et libero. Vestibulum et ullamcorper metus, at porttitor ipsum. Etiam interdum interdum metus, vitae malesuada tortor bibendum a. Cras sodales dui nunc, sit amet ornare ex faucibus vitae. Nulla quis tincidunt augue.
                    </p>
                </div>
            </div>
            <div class="col-span-2 flex flex-col gap-6 md:gap-0 md:flex-row justify-around">
                <div class="cursor-pointer flex flex-col items-center justify-center text-xl font-semibold">
                    <div class="mb-4">Flag this movie as seen</div>
                    <x-svg.eye class="w-24 text-gold-500" />
                </div>
                <div class="cursor-pointer flex flex-col items-center justify-center text-xl font-semibold">
                    <div class="mb-4">Rate this movie</div>
                    <div class="flex justify-center gap-4">
                        <x-svg.like class="w-24 text-green-500" />
                        <x-svg.unlike class="w-24 text-red-500" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
