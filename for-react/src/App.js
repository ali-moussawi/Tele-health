import React from 'react';
import './App.css';
//bootstrap
import 'bootstrap/dist/css/bootstrap.min.css';
//Include Sweetalert
import Swal from 'sweetalert2'
//axios for api request
import axios from 'axios';
class App extends React.Component {
  constructor(props)
    {
      super(props);
      this.addFormData = this.addFormData.bind(this);
    }
  //Form Submission
  addFormData(evt)
    {
      evt.preventDefault();
      const fd = new FormData();
      fd.append('myUsername', this.refs.myUsername.value);
      fd.append('myEmail', this.refs.myEmail.value);
      fd.append('mymessage',this.refs.mymessage.value)
      axios.post('http://localhost/project/public/addreview.php', fd
      ).then(res=>
      {
      //Success alert
       Swal.fire({
      title: 'Therichpost',
      text: res.data.data,
      type: 'success',
      
    });
    this.myFormRef.reset();
    }
    );
    }
 
  render() {
   
    return (
    
      <div className="maincontainer" style={{borderBlock:"solid",margin:"30px",borderBlockColor:"green"}}>
        
        <h1 className="mr-5 ml-5 mt-5" style={{color:'green',marginLeft:'250px'}}>FeedBack</h1>
        <div className="container mb-5 mt-5 text-left">
        
        <form ref={(el) => this.myFormRef = el}>
        <div className="form-group" style={{marginBottom:'50px'}}>
        <input type="email" className="form-control" id="Email" aria-describedby="emailHelp" placeholder="Enter email" ref="myEmail" />
        
        </div>
        <div className="form-group" style={{marginBottom:'50px'}}>
        <input type="text" className="form-control" id="Username" placeholder="Enter name" ref="myUsername" />
        </div>
       
        <div className="form-group" style={{marginBottom:'50px'}}>
        <textarea className="form-control" id="message" placeholder="Enter your feedback" ref="mymessage" />
        </div>
      

        <button type="submit" className="btn btn-primary" onClick={this.addFormData}>Submit</button>
      </form>
       
            
      </div>
     
      </div>
      
)
};
}
export default App;