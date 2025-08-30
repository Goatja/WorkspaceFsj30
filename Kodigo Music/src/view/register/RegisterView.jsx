import { yupResolver } from "@hookform/resolvers/yup";
import { useForm } from "react-hook-form";
import * as yup from "yup";
import "./register.css";

const schema = yup.object({
  usuario: yup.string().required("Usuario requerido"),
  email: yup
    .string()
    .email("Correo no válido")
    .required("Correo requerido"),
  password: yup
    .string()
    .min(8, "Mínimo 8 caracteres")
    .matches(/[A-Za-z]/, "Debe contener letras")
    .matches(/[0-9]/, "Debe contener números")
    .matches(/[!@#$%^&*(),.?\":{}|<>]/, "Debe contener un carácter especial")
    .required("Contraseña requerida"),
  confirm_password: yup
    .string()
    .oneOf([yup.ref("password")], "Las contraseñas no coinciden")
    .required("Confirmación requerida"),
});

export const RegisterView = () => {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm({
    resolver: yupResolver(schema),
  });

  const onSubmit = (data) => {
    console.log("Datos enviados:", data);
  };

  return (
    <div
      className="container-fluid d-flex align-items-center justify-content-center"
      style={{ width: "100vw", height: "100dvh", backgroundColor: "#1c2541" }}
    >
      <div className="row w-100 px-3">
        {/* Sección de presentación */}
        <section className="col-lg-7 col-md-6 col-sm-12 text-light text-center mb-4 mb-md-0">
          <h1 className="fw-bold display-4">Subscribe</h1>
          <p className="fs-4 lh-base shadow-sm px-3">
            Sumérgete en el ritmo que mueve al mundo. En Kodigo Music, la música no solo se escucha—se vive.
          </p>
        </section>

        {/* Sección del formulario */}
        <section className="col-lg-5 col-md-6 col-sm-12">
          <form
            onSubmit={handleSubmit(onSubmit)}
            className="bg-dark p-4 rounded shadow text-light"
          >
            <h2 className="text-center fw-bold mb-4">Register</h2>

            <div className="mb-3">
              <label htmlFor="usuario" className="form-label">User</label>
              <input
                id="usuario"
                type="text"
                className="form-control"
                {...register("usuario")}
              />
              {errors.usuario && <p className="text-danger">{errors.usuario.message}</p>}
            </div>

            <div className="mb-3">
              <label htmlFor="email" className="form-label">Email</label>
              <input
                id="email"
                type="email"
                className="form-control"
                {...register("email")}
              />
              {errors.email && <p className="text-danger">{errors.email.message}</p>}
            </div>

            <div className="mb-3">
              <label htmlFor="password" className="form-label">Password</label>
              <input
                id="password"
                type="password"
                className="form-control"
                {...register("password")}
              />
              {errors.password && <p className="text-danger">{errors.password.message}</p>}
            </div>

            <div className="mb-3">
              <label htmlFor="confirm_password" className="form-label">Confirm Password</label>
              <input
                id="confirm_password"
                type="password"
                className="form-control"
                {...register("confirm_password")}
              />
              {errors.confirm_password && <p className="text-danger">{errors.confirm_password.message}</p>}
            </div>

            <button type="submit" className="btn btn-info w-100 mt-3">
              Send
            </button>
          </form>
        </section>
      </div>
    </div>
  );
};
