import './bootstrap';

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKFinder from '@ckeditor/ckeditor5-ckfinder/src/ckfinder';

document.addEventListener('DOMContentLoaded', function () {
    const editorElement = document.querySelector('#isi');
    if (editorElement) {
        ClassicEditor
            .create(editorElement, {
                extraPlugins: [ CKFinder ],
                ckfinder: {
                    uploadUrl: '/ckeditor/upload'
                }
            })
            .catch(error => {
                console.error(error);
            });
    }
});

