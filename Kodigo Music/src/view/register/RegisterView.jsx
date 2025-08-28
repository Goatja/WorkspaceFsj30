import './register.css'
import {useForm} from 'react-hook-form'
import * as yup from 'yup'

export const RegisterView = () => {
    
    const {register, handleSubmit} = useForm();
  return (
    <>
        <div className="wrap-form-container row">
            <section className='col-lg-8 col-md-8 col-sm-12 text-light m-auto'>
                <h1 className='text-center'>Kody Music</h1>
                <p className='text-center lh-1'>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit rerum sit exercitationem eum? Inventore quod vitae esse itaque reprehenderit, perferendis aliquid fugiat doloremque voluptate maxime, natus soluta nobis iure reiciendis.</p>

            </section>
            <section className='col-lg-4 col-md-4 col-sm-12'>
               
                <form onSubmit={handleSubmit(data => alert(JSON.stringify(data)))} 
                    className='form h-75 p-3 color-fondo-secundario rounded text-light'>
                     <h1 className='text-center fw-bolder fs-1 text-light'>Register</h1>
                    <label htmlFor="" className='form-label'>Usuario</label>
                    <input className='form-control' {...register('usuario')}/>
                    <label htmlFor="" className='form-label'>Email</label>
                    <input className='form-control' {...register('email')}/>
                    <label htmlFor="" className='form-label'>Password</label>
                    <input className='form-control' {...register('Password')}/>
                    <label htmlFor="" className='form-label'>Confirm password</label>
                    <input className='form-control' {...register('confirm_password')}/>
                    <button type='submit' className='btn-info mt-3 '>Send</button>

                </form>

            </section>
            
        </div>
    </>
  )
}
