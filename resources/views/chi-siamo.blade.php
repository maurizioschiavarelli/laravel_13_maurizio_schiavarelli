<x-html>

    

    <h1 class="titolo_index">Chi Siamo</h1>

    <!-- funzione empty che se negata stampa se trova una variabile, se non la trova non stampa -->
    @if (!empty($auth))
        <h1 class="titolo_index">Benvenuto {{$auth['username']}}</h1>
    @endif

    <p class="chiSiamo">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus obcaecati doloremque a sit odit? Molestias error sequi iure sapiente illum, non cumque enim ipsum obcaecati quia dicta. A tempore ducimus aliquid! Omnis impedit beatae nobis commodi temporibus, architecto praesentium alias aperiam ea tenetur. Veniam, repudiandae! Obcaecati nemo suscipit eos nesciunt pariatur cumque! Eos laboriosam, provident ducimus nobis quasi, nisi consequatur consequuntur quos obcaecati officia vel delectus voluptatibus accusantium iste accusamus velit facilis eaque recusandae eveniet enim odit est earum. Voluptatem in atque dolorum veniam sed mollitia dolore veritatis eaque expedita, voluptatum voluptas, et natus repellat quia commodi. Quidem nemo culpa ratione, sunt harum dolorum accusantium iusto saepe quasi deserunt repellat, consectetur rem beatae ad odio nostrum tempore perferendis delectus, nam cum facilis enim. Eius vel, eveniet voluptas nulla suscipit, neque doloribus iusto est in totam officiis fuga sit, ad possimus sint natus cum maxime provident eum mollitia dignissimos rerum quidem.
    </p>

</x-html>