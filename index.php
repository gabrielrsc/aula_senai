<?php
// 1. CONEXÃO

    $pdo = new PDO("mysql:host=localhost;dbname=aula_php", "root", "");

// 2. CREATE (Adicionar)
if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
    $sql = "INSERT INTO tarefas (descricao) VALUES (:desc)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':desc' => $_POST['descricao']]);
    header("Location: index.php");
    exit;
}

// 3. UPDATE (Marcar como concluída) - O "U" do CRUD
if (isset($_GET['concluir'])) {
    $id = $_GET['concluir'];
    $sql = "UPDATE tarefas SET status = 'concluido' WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    header("Location: index.php");
    exit;
}

// 4. DELETE (Excluir)
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $sql = "DELETE FROM tarefas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    header("Location: index.php");
    exit;
}

// 5. READ (Listar)
$sql = "SELECT * FROM tarefas ORDER BY status DESC, id DESC";
$tarefas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Completo - Aula PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .concluida { text-decoration: line-through; color: #6c757d; }
    </style>
</head>
<body class="bg-light">
    <div class="text-end mb-3">
    <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#modalAjuda">
        O que é CRUD?
    </button>
</div>
<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Lista de Tarefas</h3>

        <form method="POST" class="d-flex mb-4">
            <input type="text" name="descricao" class="form-control me-2" placeholder="Nova tarefa..." required>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Tarefa</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarefas as $t): ?>
                <tr>
                    <td class="<?= $t['status'] == 'concluido' ? 'concluida' : '' ?>">
                        <?= htmlspecialchars($t['descricao']) ?>
                    </td>
                    <td class="text-end">
                        <?php if ($t['status'] == 'pendente'): ?>
                            <a href="?concluir=<?= $t['id'] ?>" class="btn btn-outline-primary btn-sm">Concluir</a>
                        <?php endif; ?>
                        <a href="?excluir=<?= $t['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal de Ajuda -->
<div class="modal fade" id="modalAjuda" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Entendendo os Comandos SQL</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <?php include 'explicacao.php'; ?>
      </div>
    </div>
  </div>
</div>

<!-- Script necessário para o Modal e o Accordion funcionarem -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>