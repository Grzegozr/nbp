<div id="confirmDeleteModal" class="fixed inset-0 overflow-y-auto hidden z-50 flex items-center justify-center">
    <div id="modalBackground" class="bg-black bg-opacity-50 fixed inset-0"></div>

    <div class="bg-white p-4 rounded-md shadow-md max-w-md w-full relative">
        <div class="text-xl font-semibold mb-4">Potwierdź usunięcie</div>

        <p>Czy na pewno chcesz usunąć ten element?</p>

        <form id="deleteRecordForm" method="POST">
            @csrf
            @method('DELETE')

            <div class="mt-4 flex justify-end">
                <button id="cancelDelete" type="button" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md mr-2">Anuluj</button>
                <button id="confirmDelete" type="button" class="px-4 py-2 bg-red-500 text-white rounded-md">Usuń</button>
            </div>
        </form>
    </div>
</div>
