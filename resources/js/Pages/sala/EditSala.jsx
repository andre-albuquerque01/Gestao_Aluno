import NavBar from "@/Components/NavBar";
import { Head, useForm, usePage } from "@inertiajs/react";
import { useState } from "react";

export default function CadastroSala() {
    const [valueErr, setValue] = useState();
    const { data, setData, post, errors } = useForm({
        turmas_id: usePage().props.relacionamento.turmas_id,
        alunos_id: usePage().props.relacionamento.alunos_id,
        id_rels: usePage().props.relacionamento.id_rels
    });
    const submit = (e) => {
        e.preventDefault();
        post(route('upSala'));
        setValue('A turma atingiu o limite máximo de alunos permitidos.');
    };

    return (
        <>
            <Head title="Edit Sala" />
            <NavBar />
            <div className="flex justify-center">
                <form onSubmit={submit}>
                    <div className="mt-5 text-2xl">
                        <h1>Alterar a sala</h1>
                    </div>
                    <input type="hidden" name="id_rels" value={data.id_rels} onChange={(e) => setData('id_rels', e.target.value)} />
                    <div className="flex flex-col space-y-1 mt-4">
                        <label htmlFor="aluno">Aluno</label>
                        <select
                            name="alunos_id"
                            id="aluno"
                            value={data.alunos_id}
                            onChange={(e) => setData('alunos_id', e.target.value)}
                            required
                        >
                            <option value="">Selecione um aluno</option>
                            {usePage().props.alunos.map((aluno) => (
                                <option key={aluno.id} value={aluno.id_aluno}>
                                    {aluno.nome}
                                </option>
                            ))}
                        </select>
                        <span className="text-red-500 mt-2">{errors.alunos_id}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4" >
                        <label htmlFor="turma">Turma</label>
                        <select name="turmas_id" id="turma" value={data.turmas_id}
                            onChange={(e) => setData('turmas_id', e.target.value)} required>
                            <option value="" disabled>Selecione uma turma</option>
                            {usePage().props.turmas.map((turma) => (
                                <option key={turma.id} value={turma.id_turma} >
                                    {turma.codTurma}
                                </option>
                            ))}
                        </select>
                        <span className="text-red-500 mt-2">{errors.turmas_id}</span>
                        <span className="text-red-500 mt-2">{valueErr}</span>
                    </div>
                    <button className="px-4 py-2 rounded-lg mt-4 bg-blue-600 text-white hover:bg-blue-400">Editar</button>
                </form >
            </div >
        </>
    );
}
