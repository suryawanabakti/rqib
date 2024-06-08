import Pagination from "@/Components/Pagination";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import {
    IconBook2,
    IconDotsVertical,
    IconList,
    IconPencil,
    IconPlus,
    IconUsers,
} from "@tabler/icons-react";

export default function Index({ auth, matakuliah, search }) {
    const header = (
        <div className="row g-2 align-items-center">
            <div className="col">
                {/* Page pre-title */}
                <div className="page-pretitle">Overview</div>
                <h2 className="page-title">Mata Pelajaran</h2>
            </div>
            {/* Page title actions */}
            <div className="col-auto ms-auto d-print-none">
                <div className="btn-list">
                    <Link
                        href={route("admin.matakuliah.create")}
                        className="btn btn-primary"
                    >
                        <IconPlus className="icon" /> Mata Pelajaran
                    </Link>
                </div>
            </div>
        </div>
    );

    return (
        <AuthenticatedLayout user={auth.user} header={header}>
            <Head title="Pendaftar" />

            <div className="card">
                <table className="table card-table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {matakuliah.data.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td>{data.matakuliah}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button
                                                class=""
                                                type="button"
                                                id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"
                                            >
                                                <IconDotsVertical className="icon" />
                                            </button>
                                            <ul
                                                class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton1"
                                            >
                                                <li>
                                                    <Link
                                                        class="dropdown-item"
                                                        href={route(
                                                            "admin.matakuliah.destroy",
                                                            data.id
                                                        )}
                                                        method="delete"
                                                        as="button"
                                                    >
                                                        Hapus
                                                    </Link>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            );
                        })}
                    </tbody>
                </table>
            </div>
            <Pagination
                links={matakuliah.links}
                search={search ? search : ""}
            />
        </AuthenticatedLayout>
    );
}
