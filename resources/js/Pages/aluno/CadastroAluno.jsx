import { useForm } from "@inertiajs/react";

export default function CadastroAluno() {
    const { data, setData, post, errors } = useForm({
        nome: '',
        cpf: '',
        sexo: '',
        dataNasc: '',
        email: '',
        rendaMensal: '',
    });
    const submit = (e) => {
        e.preventDefault();
        post(route('alunoCadastro'));
        console.log('Foi enviado')
    };
    return (
        <div className="flex justify-center">
            <form onSubmit={submit} >
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
                    <span message={errors.nome} className="mt-2"></span>
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
                        required />
                    <span message={errors.cpf} className="mt-2"></span>
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
                    <span message={errors.sexo} className="mt-2"></span>
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
                    <span message={errors.dataNasc} className="mt-2"></span>
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
                    <span message={errors.email} className="mt-2"></span>
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
                    <span message={errors.rendaMensal} className="mt-2"></span>
                </div>
                <button className="px-4 py-2 rounded-lg mt-4 bg-blue-600 text-white hover:bg-blue-400">Cadastrar</button>
            </form >
        </div >
    )
}