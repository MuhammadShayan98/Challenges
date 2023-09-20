import React, { useEffect, useState } from 'react'
import axios from 'axios';
import BASE_URL from '../Constants/Constants';

export const Home = () => {
    // const [challenge2, setChallenge2] = useState([])
    const [file, setFile] = useState(null)
    // useEffect(() => {
    //      axios
    //         .get(`${BASE_URL}home`)
    //         .then((res)=>{
    //             setChallenge2(res.data.data.challenge_2)
    //         })
    //         .catch((err)=>{
    //             console.log(err);
    //         })
    // }, [])
    const onFileChange = (e) => {
      setFile(e.target.files[0]);
    }
    const onFileUpload = (e) => {
        e.preventDefault()
        const formData = new FormData();

        formData.append(
            "select_file",
            file
        );
 
        axios.post(`${BASE_URL}upload`, formData, {
          'X-Requested-With': 'XMLHttpRequest',
          'Content-Type': 'application/json'
        }).then((res)=>{
          console.log(res);
        })
        .catch((err)=>{
            console.log(err);
        });
    }
  return (
    <div>
      <form method="POST" role="form" enctype="multiple/form-data">
        <input type="file" onChange={(e) => onFileChange(e)} />
        <button onClick={(e) => onFileUpload(e)}>
            Upload!
        </button>
      </form>
    </div>
  )
}
