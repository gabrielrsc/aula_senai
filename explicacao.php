<div class="accordion" id="accordionExplica">
  <!-- CREATE -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseC">
        <strong>C</strong>reate (Criar)
      </button>
    </h2>
    <div id="collapseC" class="accordion-collapse collapse" data-bs-parent="#accordionExplica">
      <div class="accordion-body">
        <code>INSERT INTO tarefas (descricao) VALUES (:desc)</code>
        <p class="mt-2 text-muted small">Envia novos dados ao banco. Usamos <strong>Prepared Statements</strong> (:desc) para evitar SQL Injection.</p>
      </div>
    </div>
  </div>

  <!-- READ -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseR">
        <strong>R</strong>ead (Ler)
      </button>
    </h2>
    <div id="collapseR" class="accordion-collapse collapse" data-bs-parent="#accordionExplica">
      <div class="accordion-body">
        <code>SELECT * FROM tarefas ORDER BY id DESC</code>
        <p class="mt-2 text-muted small">Recupera os dados para exibição. O <code>fetchAll()</code> transforma o resultado em um array PHP.</p>
      </div>
    </div>
  </div>

  <!-- UPDATE -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseU">
        <strong>U</strong>pdate (Atualizar)
      </button>
    </h2>
    <div id="collapseU" class="accordion-collapse collapse" data-bs-parent="#accordionExplica">
      <div class="accordion-body">
        <code>UPDATE tarefas SET status = 'concluido' WHERE id = :id</code>
        <p class="mt-2 text-muted small">Altera um registro existente. A cláusula <strong>WHERE</strong> é vital para não alterar toda a tabela.</p>
      </div>
    </div>
  </div>

  <!-- DELETE -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseD">
        <strong>D</strong>elete (Excluir)
      </button>
    </h2>
    <div id="collapseD" class="accordion-collapse collapse" data-bs-parent="#accordionExplica">
      <div class="accordion-body">
        <code>DELETE FROM tarefas WHERE id = :id</code>
        <p class="mt-2 text-muted small">Remove o registro permanentemente através da sua <strong>Chave Primária</strong> (ID).</p>
      </div>
    </div>
  </div>
</div>