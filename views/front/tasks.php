
<div class="container mt-5">
<div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
    <h1 style="color: #222; font-family: 'Quicksand', sans-serif;">Görevler</h1>
    <a href="/tasks/create" class="btn btn-primary mt-3 mt-md-0">Görev Oluştur</a>
</div>

<div class="table-responsive">
    <table class="table align-middle table-hover bg-white rounded shadow-sm overflow-hidden" style="border-radius: 18px;">
        <thead class="bg-light">
            <tr>
                <th class="text-secondary" style="border-top-left-radius: 12px;">ID</th>
                <th class="text-secondary">Başlık</th>
                <th class="text-secondary">Açıklama</th>
                <th class="text-secondary">Oluşturulma Tarihi</th>
                <th class="text-secondary" style="border-top-right-radius: 12px;">İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $task): ?>
    <tr class="align-middle">
        <td class="fw-bold"><?= $task['id'] ?></td>
        <td><?= htmlspecialchars($task['title'] ?? '') ?></td>
        <td><?= htmlspecialchars($task['description'] ?? '') ?></td>
        <td><?= $task['created_at'] ?? '' ?></td>
        <td>
            <a href="/tasks/edit/<?= $task['id'] ?>" class="btn btn-sm btn-outline-warning me-1">Düzenle</a>
            <a href="/tasks/delete/<?= $task['id'] ?>" class="btn btn-sm btn-outline-danger">Sil</a>
        </td>
    </tr>
<?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .table-responsive {
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 24px 0 rgba(0,0,0,0.07);
        background: #fff;
    }
    .table thead th {
        background: #f8f9fa !important;
        color: #495057;
        font-weight: 600;
        border: none;
        font-size: 1.05rem;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }
    .table tbody tr {
        transition: background 0.2s;
    }
    .table tbody tr:hover {
        background: #f1f3f6;
    }
    .table td, .table th {
        border: none;
        vertical-align: middle;
        padding: 0.85rem 0.75rem;
    }
    .btn-outline-warning, .btn-outline-danger {
        border-radius: 8px;
    }
    @media (max-width: 575.98px) {
        .table-responsive {
            border-radius: 0;
            box-shadow: none;
        }
        .table thead {
            display: none;
        }
        .table, .table tbody, .table tr, .table td {
            display: block;
            width: 100%;
        }
        .table tr {
            margin-bottom: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px 0 rgba(0,0,0,0.06);
            background: #fff;
        }
        .table td {
            text-align: left;
            padding-left: 50%;
            position: relative;
        }
        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 1rem;
            width: 45%;
            text-align: left;
            font-weight: 600;
            color: #888;
        }
    }
</style>
<script>
    // Responsive table için mobilde th başlıklarını td'ye ekle
    document.addEventListener("DOMContentLoaded", function() {
        if(window.innerWidth < 576) {
            document.querySelectorAll('.table tbody tr').forEach(function(row) {
                let headers = ["ID", "Title", "Description", "Created At", "Actions"];
                row.querySelectorAll('td').forEach(function(td, i) {
                    td.setAttribute('data-label', headers[i]);
                });
            });
        }
    });
</script>