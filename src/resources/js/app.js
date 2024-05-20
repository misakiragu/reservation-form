document.addEventListener('DOMContentLoaded', function() {
    console.log('Document is ready');
    var favoriteButtons = document.querySelectorAll('.favorite-button');
    favoriteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // デフォルトのフォーム送信を防ぐ
            var form = this.closest('form');
            var url = form.action;
            var method = form.querySelector('input[name="_method"]') ? form.querySelector('input[name="_method"]').value : 'post';
            var data = new FormData(form);

            fetch(url, {
                method: method.toUpperCase(),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: data
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    this.classList.toggle('active');
                    console.log('お気に入りが更新されました');
                } else {
                    console.error('お気に入りの更新に失敗しました');
                }
            })
            .catch(error => {
                console.error('エラー:', error);
            });
        });
    });
});