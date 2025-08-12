<div x-show="showViewDialog" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
    <div @click.away="showViewDialog = false"
        class="bg-gray-800 rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-2xl font-bold text-white">2025 Summer Music Trends</h3>
                <button @click="showViewDialog = false" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <img src="/images/bg-3.jpg" alt="Event" class="w-full h-64 object-cover rounded-lg mb-6">

            <div class="prose prose-invert max-w-none max-h-44 overflow-y-auto scrollbar-none">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus distinctio facere voluptatem sunt quae voluptates consequuntur, sed, iure beatae rem inventore? Saepe quasi itaque hic. Laborum delectus voluptatibus assumenda corporis consequatur in commodi modi, necessitatibus ratione dolorem eos vel at nobis sequi eligendi repellat? Delectus, quae nisi! Minima deleniti optio quis adipisci excepturi odit officia voluptatem, doloribus recusandae laudantium unde sed dolor aperiam quisquam ipsa, aliquid praesentium dignissimos alias ut sunt corrupti vitae. Laudantium quibusdam eos exercitationem beatae dolorum. Rem pariatur similique voluptatem, aperiam quasi numquam tempora dolores ducimus veritatis expedita earum quas necessitatibus ab quidem totam quod nisi assumenda? Fugiat sit odio ullam. Deserunt atque, repellendus officiis maxime itaque eaque aliquid tempore alias sequi iste, esse fugit nostrum corrupti nemo qui. Consectetur esse cum dignissimos, perferendis sunt animi ullam voluptate assumenda. Voluptatem ipsam tempora quibusdam nisi hic eligendi reprehenderit rerum animi eos dicta illum aspernatur magni, laborum accusantium sed recusandae necessitatibus ut, voluptatum saepe, facilis totam sapiente maiores optio. Ullam a hic cumque? Ullam id suscipit perspiciatis tempore consequuntur iusto, modi cumque debitis tenetur est quaerat sequi laborum expedita soluta consectetur, asperiores nisi mollitia quia praesentium eum sapiente alias. Expedita inventore natus voluptas provident, odit, aut esse, in voluptate magnam atque obcaecati recusandae corrupti odio saepe dolorem dolorum quas harum earum. Deserunt, accusantium! Repellat non minima eius incidunt rerum modi illo tenetur nobis, harum at excepturi tempora, iure facere velit expedita quis dolorem beatae quisquam placeat hic officiis. Soluta, illum? Rem, alias! Quae tenetur esse quis voluptates fugiat veritatis repudiandae? Placeat a rerum fugit alias repellat voluptatum eius facilis illo nisi quaerat vel odit asperiores, laborum vero deleniti recusandae ratione neque atque perferendis inventore iure omnis, nesciunt veritatis at! Minus suscipit quisquam, laboriosam quam dicta vero vitae aperiam impedit deleniti pariatur id quibusdam nemo alias maiores ipsum sequi a harum, quasi repellat? Ea illum optio eveniet dolorem ut quasi. Doloremque laborum possimus sint natus cum accusamus explicabo ipsa libero necessitatibus temporibus quos quasi aspernatur tempore non asperiores vitae repudiandae ratione atque deleniti aut soluta, adipisci iure voluptas! Incidunt provident dolore optio eligendi quae dicta ipsum, placeat reiciendis inventore deleniti neque! Perferendis autem suscipit eum eveniet perspiciatis error optio, necessitatibus voluptatibus hic officiis temporibus amet accusamus omnis maxime ullam! Laboriosam aspernatur perferendis deleniti ullam neque suscipit sequi rerum aut, blanditiis aliquid quo, dolore enim totam ratione, nihil quis omnis atque. Quas eligendi quidem itaque, fugiat quae eveniet dolorum voluptate odio laboriosam aliquid eaque culpa excepturi inventore possimus at a eum doloribus deserunt accusantium fuga obcaecati? Fugit ducimus, voluptate dignissimos suscipit illum nobis ab quis quo officia sint. Atque debitis nobis illum eius itaque natus et quibusdam assumenda maxime ipsa? Neque iste illo cupiditate voluptas necessitatibus consequuntur repellat officia beatae totam, temporibus veritatis dolor corporis architecto cumque eius repudiandae praesentium. Odio odit dolore, est culpa officia consequatur reiciendis quam! Fugiat dicta dolorum corporis nostrum ducimus deleniti nulla nemo. Quia mollitia repudiandae, animi necessitatibus maxime adipisci. Atque maiores numquam quo illum? Ex laborum voluptatibus aliquid labore dolor omnis fuga officiis officia quidem!
            </div>

            <div class="mt-6 pt-4 border-t border-gray-700 flex items-center justify-between">
                <div class="flex items-center space-x-2 text-gray-400">
                    <i class="fa-regular fa-clock"></i>
                    <span>Posted 8 minutes ago</span>
                </div>
            </div>
        </div>
    </div>
</div>
