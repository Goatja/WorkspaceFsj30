import { yupResolver } from "@hookform/resolvers/yup";
import "./register.css";
import { useForm } from "react-hook-form";
import * as yup from "yup";

export const RegisterView = () => {
  const schema = yup.object({
    usuario: yup.string(),
    email: yup.string().matches(/[@.]/, "No valid mail"),
    password: yup.string()
    .min(8)
    .matches(/[A-Za-z]/)
    .matches(/[0-9]/)
    .matches(/[!@#$%^&*()]/)
  });

  const { register, handleSubmit } = useForm({
    resolver: yupResolver(schema),
  });

  const onSubmit = (data) => {
    console.log(data);
  };
  return (
    <>
      <div className="wrap-form-container row">
        <section className="col-lg-8 col-md-8 col-sm-12 text-light m-auto">
          <h1 className="text-center">Kody Music</h1>
          <p className="text-center fs-4 lh-3 shadow">
            Sumérgete en el ritmo que mueve al mundo. En Kodigo Music, la música
            no solo se escucha—se vive. Descubre los éxitos que están marcando
            tendencia, desde los beats electrizantes de Dua Lipa hasta las
            melodías inolvidables de Ed Sheeran y The Weeknd. Explora playlists
            curadas, conoce nuevos artistas, y deja que cada canción te acompañe
            en tu día. Ya sea que estés buscando inspiración, energía o
            simplemente una buena vibra, aquí encontrarás el sonido perfecto
            para cada momento. Regístrate hoy y forma parte de una comunidad que
            vibra al compás de la música. Porque en Kodigo Music, cada nota
            cuenta.
          </p>
        </section>
        <section className="col-lg-4 col-md-4 col-sm-12">
          <form
            onSubmit={handleSubmit(onSubmit)}
            className="form p-3 color-fondo-secundario rounded text-light"
          >
            <h1 className="text-center fw-bolder fs-1 text-light">Register</h1>
            <label htmlFor="" className="form-label">
              Usuario
            </label>
            <input className="form-control" {...register("usuario")} />
            <label htmlFor="" className="form-label">
              Email
            </label>
            <input className="form-control" {...register("email")} />
            <label htmlFor="" className="form-label">
              Password
            </label>
            <input className="form-control" {...register("password")} />
            <label htmlFor="" className="form-label">
              Confirm password
            </label>
            <input className="form-control" {...register("confirm_password")} />
            <button type="submit" className="btn-info mt-3 ">
              Send
            </button>
          </form>
        </section>
      </div>
    </>
  );
};
