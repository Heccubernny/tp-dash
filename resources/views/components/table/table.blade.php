<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y bg-white shadow-md rounded-md divide-gray-200">
                    @includeIf('components.table.thead', ['title' =>'Admin'])
                    <tbody class="bg-white divide-y-8 divide-gray-200 mb-24">
                        @includeIf('components.table.trow', ['some' => 'data'])


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
