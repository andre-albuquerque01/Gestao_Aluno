import { Head, useForm, usePage } from "@inertiajs/react";

export default function CadastroSala() {
    const { data, setData, post, errors, } = useForm({
        turmas_id: '',
        alunos_id: ''
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('cadSala'));
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
                        <select
                            name="alunos_id"
                            id="aluno"
                            value={data.alunos_id}
                            onChange={(e) => setData('alunos_id', e.target.value)} required>
                            <option value="" selected>Selecione um aluno</option>
                            {usePage().props.alunos.map((aluno) => (
                                <option key={aluno.id} value={aluno.id}>
                                    {aluno.nome}
                                </option>
                            ))}
                        </select>
                        <span className="text-red-500 mt-2">{errors.alunos_id}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4" >
                        <select name="turmas_id" id="turma" value={data.turmas_id}
                            onChange={(e) => setData('turmas_id', e.target.value)} required>
                            <option value="" selected>Selecione uma turma</option>
                            {usePage().props.turmas.map((turma) => (
                                <option key={turma.id} value={turma.id}>
                                    {turma.codTurma}
                                </option>
                            ))}
                        </select>
                        <span className="text-red-500 mt-2">{errors.turmas_id}</span>
                    </div>
                    <button className="px-4 py-2 rounded-lg mt-4 bg-blue-600 text-white hover:bg-blue-400">Adicionar</button>
                </form>
            </div>
        </>
    );
}
