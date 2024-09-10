
        // Função para obter parâmetros da URL
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        // Função para remover parâmetros da URL
        function removeQueryParam(param) {
            const url = new URL(window.location);
            url.searchParams.delete(param);
            window.history.replaceState({}, document.title, url.toString());
        }

        // Exibir mensagem com base no status da URL e limpar o parâmetro
        document.addEventListener('DOMContentLoaded', (event) => {
            const status = getQueryParam('status');
            const messageElement = document.getElementById('message');

            if (status === 'success') {
                messageElement.textContent = 'Mensagem enviada com sucesso!';
                messageElement.className = 'message success';

                // Definir tempo para a mensagem desaparecer
                setTimeout(() => {
                    messageElement.textContent = '';
                    messageElement.className = '';
                    removeQueryParam('status'); // Limpar o parâmetro da URL
                }, 3000); // Tempo em milissegundos (3 segundos)
            } else if (status === 'error') {
                messageElement.textContent = 'Ocorreu um erro ao enviar a mensagem. Tente novamente mais tarde.';
                messageElement.className = 'message error';
                removeQueryParam('status'); // Limpar o parâmetro da URL
            }
        });
