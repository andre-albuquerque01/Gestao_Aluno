import { Link, usePage } from '@inertiajs/react';
import pencil from '../../img/pencil.gif'
import trash from '../../img/lixo.gif'
import { format } from 'date-fns';

export default function Turma() {

    return (
        <div className="">
            <div className="">
                <div className="ml-16">
                    <div className='mt-6 font-bold'>
                        <h1>Turma</h1>
                    </div>
                    <div className="flex items-center mt-1 mb-10 font-normal">
                        <table className="w-2/3 text-center">
                            <tr className='border bg-blue-200'>
                                <th>Posição</th>
                                <th>Código Turma</th>
                                <th>Data de início</th>
                                <th>Data de fim</th>
                                <th>Qtd máxima de alunos</th>
                                <th>Editar aluno</th>
                                <th>Remover aluno</th>
                            </tr>
                            {usePage().props.turmas.map((turmas, index) => (
                                <tr key={index}>
                                    <td>{index}</td>
                                    <td>
                                        {turmas.codTurma}
                                    </td>
                                    <td>
                                        {format(new Date(turmas.dataInicio), 'dd/MM/yyyy')}
                                    </td>
                                    <td>
                                        {format(new Date(turmas.dataFim), 'dd/MM/yyyy')}
                                    </td>
                                    <td>
                                        {turmas.qtdAlunos}
                                    </td>
                                    <td>
                                        <Link href={`editTurma/${turmas.id_turma}`} className="flex items-center justify-center">
                                            <img src={pencil} alt="" width='20px' title='Editar' />
                                        </Link>
                                    </td>
                                    <td>
                                        <a href={`removeTurma/${turmas.id_turma}`} className="flex items-center justify-center">
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
