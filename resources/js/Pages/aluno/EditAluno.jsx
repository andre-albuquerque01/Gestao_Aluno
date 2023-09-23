import NavBar from "@/Components/NavBar";
import { Head, useForm, usePage } from "@inertiajs/react";

export default function EditAluno() {
    const { data, setData, post, errors } = useForm({
        id_aluno: usePage().props.aluno.id_aluno,
        nome: usePage().props.aluno.nome,
        cpf: usePage().props.aluno.cpf,
        sexo: usePage().props.aluno.sexo,
        dataNasc: usePage().props.aluno.dataNasc,
        email: usePage().props.aluno.email,
        rendaMensal: usePage().props.aluno.rendaMensal,
    });
    console.log(usePage().props.aluno.cpf);
    const submit = (e) => {
        e.preventDefault();
        post(route('upAluno'));
        console.log('Foi enviado')
    };
    return (
        <>
            <Head title="Editar aluno" />
            <NavBar />
            <div className="flex justify-center">
                <form onSubmit={submit} >
                    <div className="mt-5 text-2xl">
                        <h1>Cadastro do aluno</h1>
                    </div>
                    <input
                        type="hidden"
                        name="id_aluno"
                        id="id_aluno"
                        className="border rounded-md w-96"
                        value={data.id_aluno}
                        onChange={(e) => setData('id_aluno', e.target.value)}
                        required />

                    <div className="flex flex-col space-y-1 mt-4">
                        <label htmlFor="nome" className="">Nome:</label>
                        <input
                            type="text"
                            name="nome"
                            id="nome"
                            className="border rounded-md w-96"
                            placeholder="Nome"
                            value={data.nome}
                            onChange={(e) => setData('nome', e.target.value)}
                            required />
                        <span className="text-red-500 mt-2">{errors.nome}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4">
                        <label htmlFor="cpf">CPF:</label>
                        <input
                            type="text"
                            name="cpf"
                            id="cpf"
                            className="border rounded-md w-96"
                            minlength="14"
                            maxlength="14"
                            placeholder="000.000.000-00"
                            value={data.cpf}
                            onChange={(e) => setData('cpf', e.target.value)}
                            required disabled />
                        <span className="text-red-500 mt-2">{errors.cpf}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4">
                        <label htmlFor="sexo">Sexo:</label>
                    </div>
                    <div className="flex items-center">
                        <label htmlFor="sexo">Femenino:</label>
                        <input
                            type="radio"
                            name="sexo"
                            id="sexo"
                            value='f'
                            checked={data.sexo === 'F'}
                            onChange={(e) => setData('sexo', e.target.value)}
                            required />
                        <label htmlFor="sexo" className="ml-5">Masculino:</label>
                        <input
                            type="radio"
                            name="sexo"
                            id="sexo"
                            value="M"
                            checked={data.sexo === 'M'}
                            onChange={(e) => setData('sexo', e.target.value)}
                            required />
                        <label htmlFor="sexo" className="ml-5">Outro:</label>
                        <input
                            type="radio"
                            name="sexo"
                            id="sexo"
                            value="O"
                            checked={data.sexo === 'O'}
                            onChange={(e) => setData('sexo', e.target.value)}
                            required />
                        <span className="text-red-500 mt-2">{errors.sexo}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4">
                        <label htmlFor="dataNasc">Data de nascimento:</label>
                        <input
                            type="date"
                            name="dataNasc"
                            id="dataNasc"
                            min="1900-01-01"
                            className="border rounded-md w-96"
                            value={data.dataNasc}
                            onChange={(e) => setData('dataNasc', e.target.value)}
                            required />
                        <span className="text-red-500 mt-2">{errors.dataNasc}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4">
                        <label htmlFor="email">Email:</label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            className="border rounded-md w-96"
                            step='0.1'
                            min="0"
                            placeholder="E-mail"
                            value={data.email}
                            onChange={(e) => setData('email', e.target.value)}
                            required
                        />
                        <span className="text-red-500 mt-2">{errors.email}</span>
                    </div>
                    <div className="flex flex-col space-y-1 mt-4">
                        <label htmlFor="rendaMensal">Renda mensal:</label>
                        <input
                            type="number"
                            name="rendaMensal"
                            id="rendaMensal"
                            className="border rounded-md w-96"
                            step='0.1'
                            min="0"
                            placeholder="Renda mensal"
                            value={data.rendaMensal}
                            onChange={(e) => setData('rendaMensal', e.target.value)}
                        />
                        <span className="text-red-500 mt-2">{errors.rendaMensal}</span>
                    </div>
                    <button className="px-4 py-2 rounded-lg mt-4 bg-blue-600 text-white hover:bg-blue-400">Editar</button>
                </form >
            </div >
        </>
    )
}