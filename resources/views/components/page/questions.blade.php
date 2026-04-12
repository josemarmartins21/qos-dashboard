<div id="img-perguntas">
    <img src="img/perguntas.png" alt="imagem representando clientes se perguntando">
</div>
            
<article>
    <h2>Perguntas frequentes</h2>
    @foreach ($querys['questions'] as $question)
        <div class="pergunta-container">
            <div class="pergunta">
                <h3>{{ $question->question }}</h3> <i class="fa-solid fa-arrow-down" id="mostrar"></i> 
                <i class="fa-solid fa-arrow-up-long hidden" id="esconder"></i>
            </div>
            <p class="resposta">
                {{ $question->response }}
            </p>
        </div>
    @endforeach
</article>