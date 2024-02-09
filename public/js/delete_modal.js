document.querySelectorAll('.delete-record-button').forEach(button => {
    button.addEventListener('click', () => {
        const recordId = button.dataset.recordId;
        const table = button.dataset.table;

        const modal = document.getElementById('confirmDeleteModal');
        const deleteForm = modal.querySelector('#deleteRecordForm');

        deleteForm.action = `/${table}/${recordId}`;

        modal.classList.remove('hidden');
    });
});

document.getElementById('cancelDelete').addEventListener('click', () => {
    const modal = document.getElementById('confirmDeleteModal');
    modal.classList.add('hidden');
});

document.getElementById('confirmDelete').addEventListener('click', () => {
    const deleteForm = document.getElementById('deleteRecordForm');
    deleteForm.submit();
});

document.getElementById('modalBackground').addEventListener('click', () => {
    const modal = document.getElementById('confirmDeleteModal');
    modal.classList.add('hidden');
});
