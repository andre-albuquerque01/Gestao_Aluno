import { Head, useForm, usePage } from "@inertiajs/react";

export default function CadastroSala() {
    const { data, setData, post, errors } = useForm({
        idTurma: usePage().props.turmas.id || '', // Certifique-se de ajustar isso conforme necessário
        codTurma: usePage().props.turmas.codTurma || '', // Certifique-se de ajustar isso conforme necessário
        idAluno: usePage().props.alunos.id || '', // Certifique-se de ajustar isso conforme necessário
        nomeAluno: usePage().props.alunos.nome || '', // Certifique-se de ajustar isso conforme necessário
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('cadastroSalaa'));
        console.log('Foi enviado');
    };

    return (
        <>
            <Head title="Cadastro Sala" />
            <div className="flex justify-center">
                <form onSubmit={submit}>
                    <div className="mt-5 text-2xl">
                        <h1>Inserir em sala o aluno</h1>
                    </div>
                    <input type="hidden" name="id" value={data.id} onChange={(e) => setData('id', e.target.value)} />
                    <div className="flex flex-col space-y-1 mt-4">
                        <select name="aluno" id="aluno">
                            {usePage().props.alunos.map((aluno) => (
                                <option key={aluno.id} value={aluno.id}>
                                    {aluno.nome}
                                    </option>
                            ))}
                        </select>
                        <span className="text-red-500 mt-2">{errors.codTurma}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4">
                        <select name="turma" id="turma">
                            {usePage().props.turmas.map((turma) => (
                                <option key={turma.id} value={turma.id}>
                                    {turma.codTurma}
                                </option>
                            ))}
                        </select>
                        <span className="text-red-500 mt-2">{errors.dataInicio}</span>
                    </div>

                    <button className="px-4 py-2 rounded-lg mt-4 bg-blue-600 text-white hover:bg-blue-400">Adicionar</button>
                </form>
            </div>
        </>
    );
}
