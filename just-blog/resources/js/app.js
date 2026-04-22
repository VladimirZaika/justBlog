import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('.delete-post-form');
    const title = document.querySelector('input[name="title"]');
    const slug = document.getElementById('slug');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const confirmDelete = confirm('Are you sure you want to delete this post?');

            if (!confirmDelete) {
                e.preventDefault();
            }
        });
    });

    title.addEventListener('input', function () {
        if (slug.dataset.edited === 'true') return;

        slug.value = title.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    });

    slug.addEventListener('input', function () {
        slug.dataset.edited = 'true';
    });
});