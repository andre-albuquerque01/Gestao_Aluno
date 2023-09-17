import { useForm } from "@inertiajs/react";

export default function CadastroTurma() {
    const { data, setData, post, errors } = useForm({
        codTurma: '',
        dataInicio: '',
        dataFim: '',
        qtdAlunos: '',
    });
    const submit = (e) => {
        e.preventDefault();
        post(route('turmaCadastro'));
        console.log('Foi enviado')
    };
    return (
        <div className="flex justify-center">
            <form onSubmit={submit} >
                <div className="flex flex-col space-y-1 mt-4">
                    <label htmlFor="codTurma">Codigo da turma</label>
                    <input
                        type="text"
                        name="codTurma"
                        id="codTurma"
                        className="border rounded-md w-96"
                        placeholder="Código da turma"
                        value={data.codTurma}
                        onChange={(e) => setData('codTurma', e.target.value)}
                        required />
                    <span message={errors.codTurma} className="mt-2"></span>
                </div>
                <div className="flex flex-col space-y-1 mt-4">
                    <label htmlFor="dataInicio">Data de inicio</label>
                    <input
                        type="date"
                        name="dataInicio"
                        id="dataInicio"
                        min="1900-01-01"
                        className="border rounded-md w-96"
                        value={data.dataInicio}
                        onChange={(e) => setData('dataInicio', e.target.value)}
                        required />
                    <span message={errors.dataInicio} className="mt-2"></span>
                </div>
                <div className="flex flex-col space-y-1 mt-4">
                    <label htmlFor="dataFim">Data de fim</label>
                    <input
                        type="date"
                        name="dataFim"
                        id="dataFim"
                        min="1900-01-01"
                        className="border rounded-md w-96"
                        value={data.dataFim}
                        onChange={(e) => setData('dataFim', e.target.value)}
                        required />
                    <span message={errors.dataFim} className="mt-2"></span>
                </div>
                <div className="flex flex-col space-y-1 mt-4">
                    <label htmlFor="qtdAlunos">Quantidade de aluno</label>
                    <input
                        type="number"
                        name="qtdAlunos"
                        id="qtdAlunos"
                        className="border rounded-md w-96"
                        placeholder="Quantidade de alunos"
                        value={data.qtdAlunos}
                        onChange={(e) => setData('qtdAlunos', e.target.value)}
                        required />
                    <span message={errors.qtdAlunos} className="mt-2"></span>
                </div>
                <button className="px-4 py-2 rounded-lg mt-4 bg-blue-600 text-white hover:bg-blue-400">Cadastrar</button>
            </form>
        </div>
    )
}