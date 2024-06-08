import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    IconBook2,
    IconList,
    IconPencil,
    IconUsers,
} from "@tabler/icons-react";

export default function Create({ auth }) {
    const { data, setData, post, patch, errors, proccessing } = useForm({
        name: "",
    });
    const submit = (e) => {
        e.preventDefault();
        post(route("admin.kelas.store"));
    };
    const header = (
        <div className="row g-2 align-items-center">
            <div className="col">
                {/* Page pre-title */}
                <div className="page-pretitle">Overview</div>
                <h2 className="page-title">Tambah Kelas</h2>
            </div>
            {/* Page title actions */}
            <div className="col-auto ms-auto d-print-none">
                <div className="btn-list">
                    <Link
                        href={route("admin.kelas.index")}
                        className="btn btn-primary"
                    >
                        Kembali
                    </Link>
                </div>
            </div>
        </div>
    );

    return (
        <AuthenticatedLayout user={auth.user} header={header}>
            <Head title="Tambah Kelas" />
            <div className="card">
                <div className="card-header">
                    <h4 className="card-title">Form Tambah Kelas</h4>
                </div>
                <div className="card-body">
                    <form onSubmit={submit}>
                        <div className="mb-3">
                            <label htmlFor="name" className="form-label">
                                Nama
                            </label>
                            <input
                                type="text"
                                className="form-control"
                                name="name"
                                value={data.name}
                                onChange={(e) =>
                                    setData("name", e.target.value)
                                }
                                placeholder="Masukkan nama kelas..."
                            />
                        </div>
                        <button
                            className="btn btn-primary"
                            disabled={proccessing}
                        >
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
