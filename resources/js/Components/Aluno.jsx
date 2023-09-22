import { Link, usePage } from '@inertiajs/react';
import pencil from '../../img/pencil.gif'
import trash from '../../img/lixo.gif'

export default function Aluno() {

    return (
        <div className="">
            <div className="">
                <div className="ml-16">
                    <div className='mt-6 font-bold'>
                        <h1>Aluno</h1>
                    </div>
                    <div className="flex items-center mt-1 font-normal">
                        <table className="w-2/3  text-center">
                            <tr className='border bg-blue-200'>
                                <th>Posição</th>
                                <th>CPF</th>
                                <th>Aluno</th>
                                <th>Editar aluno</th>
                                <th>Remover aluno</th>
                            </tr>
                            {usePage().props.alunos.map((aluno, index) => (
                                <tr key={index} c>
                                    <td>{index}</td>
                                    <td>
                                        {aluno.cpf}
                                    </td>
                                    <td>
                                        {aluno.nome}
                                    </td>
                                    <td>
                                        <Link href={`editAluno/${aluno.id_aluno}`} className="flex items-center justify-center">
                                            <img src={pencil} alt="" width='20px' title='Editar' />
                                        </Link>
                                    </td>
                                    <td>
                                        <a href={`removeAluno/${aluno.id_aluno}`} className="flex items-center justify-center">
                                            <img src={trash} alt="" width='20px' title='Remover' />
                                        </a>
                                    </td>
                                </tr>
                            ))}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );
}
