import { useEffect } from "react";
import GuestLayout from "@/Layouts/GuestLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import { IconEye, IconEyeOff } from "@tabler/icons-react";
import FlashMessage from "@/Components/FlashMessage";

export default function Register({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        nik: "",
        alamat: "",
        gender: "",
        dob: "",
        password: "",
        remember: false,
        show_password: false,
    });

    useEffect(() => {
        return () => {
            reset("password");
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route("register"));
    };

    return (
        <GuestLayout>
            <Head title="Log in" />

            {status && (
                <div className="mb-4 font-medium text-sm text-green-600">
                    {status}
                </div>
            )}
            <div className="row g-0 flex-fill">
                <div className="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
                    <div className="container container-tight my-5 px-lg-5">
                        <div className="text-center mb-4">
                            <Link
                                href="/"
                                className="navbar-brand navbar-brand-autodark"
                            >
                                RQIB
                            </Link>
                        </div>
                        <h2 className="h3 text-center mb-3">
                            Masuk ke akun anda
                        </h2>
                        <form onSubmit={submit}>
                            <div className="mb-3">
                                <label className="form-label">
                                    Nama Lengkap
                                </label>
                                <input
                                    type="text"
                                    className="form-control"
                                    placeholder="Nama kamu..."
                                    autoComplete="name"
                                    onChange={(e) =>
                                        setData("name", e.target.value)
                                    }
                                />
                                {errors.name && (
                                    <small className="text-danger">
                                        {errors.name}
                                    </small>
                                )}
                            </div>
                            <div className="mb-3">
                                <label className="form-label">NIK</label>
                                <input
                                    type="text"
                                    className="form-control"
                                    placeholder="NIK kamu..."
                                    autoComplete="nik"
                                    onChange={(e) =>
                                        setData("nik", e.target.value)
                                    }
                                />
                                {errors.nik && (
                                    <small className="text-danger">
                                        {errors.nik}
                                    </small>
                                )}
                            </div>
                            <div className="mb-3">
                                <label className="form-label">
                                    Tanggal Lahir
                                </label>
                                <input
                                    type="date"
                                    className="form-control"
                                    placeholder="Tanggal lahir kamu..."
                                    autoComplete="dob"
                                    onChange={(e) =>
                                        setData("dob", e.target.value)
                                    }
                                />
                                {errors.dob && (
                                    <small className="text-danger">
                                        {errors.dob}
                                    </small>
                                )}
                            </div>

                            <div className="form-footer">
                                <button
                                    type="submit"
                                    className={`btn btn-primary w-100 ${
                                        processing ? "btn-loading" : ""
                                    }`}
                                >
                                    Sign in
                                </button>
                            </div>
                        </form>
                    </div>
                    <div className="text-center text-secondary mt-3">
                        Kamu sudah punya akun?{" "}
                        <Link href={route("login")} tabindex="-1">
                            Login disini
                        </Link>
                    </div>
                </div>
                <div className="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
                    {/* Photo */}
                    <div
                        className="bg-cover h-100 min-vh-100"
                        style={{
                            backgroundImage:
                                "url(https://images.pexels.com/photos/20558196/pexels-photo-20558196/free-photo-of-wanita-perempuan-kaum-wanita-bayangan.jpeg)",
                        }}
                    />
                </div>
            </div>
        </GuestLayout>
    );
}
