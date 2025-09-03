<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="bg-white rounded shadow-sm p-4">
                <h2 class="mb-4" style="color: #222; font-family: 'Quicksand', sans-serif;">Görev Oluştur</h2>
                
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                <?php endif; ?>

                <form method="post" action="/tasks/create" autocomplete="off">
                    <div class="mb-3">
                        <label for="title" class="form-label">Başlık</label>
                        <input type="text" class="form-control rounded-3" id="title" name="title" required maxlength="255" placeholder="Görev başlığı girin">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Açıklama</label>
                        <textarea class="form-control rounded-3" id="description" name="description" rows="4" required placeholder="Görev açıklaması girin"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-3 px-4">Oluştur</button>
                    <a href="/tasks" class="btn btn-outline-secondary rounded-3 ms-2">Geri Dön</a>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-white {
        background: #fff !important;
    }
    .rounded {
        border-radius: 18px !important;
    }
    .shadow-sm {
        box-shadow: 0 4px 24px 0 rgba(0,0,0,0.07) !important;
    }
    .form-control, .btn {
        border-radius: 12px !important;
    }
    .form-label {
        font-weight: 600;
        color: #495057;
    }
</style>