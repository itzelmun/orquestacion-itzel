pipeline {

  environment {
    dockerimagename1 = "itzelmunguia/proyecto:itz"
    dockerimagename2 = "itzelmunguia/phpmyadmin:itz"
    dockerImage1 = ""
    dockerImage2= ""

  }

  agent any


  stages {

    stage('Checkout Source') { 
      steps {
        git credentialsId: 'github_credential', url: 'https://github.com/itzelmun/orquestacion-itzel.git', branch:'main'
      }
    }

    stage('Build image') {
      steps{
	dir('proyecto') {
         script {        
	   dockerImage1 = docker.build dockerimagename1
          }
        }
	
	dir('phpmyadmin') {
	 script {
           dockerImage2 = docker.build dockerimagename2
          }
        }

      }
   }

    stage('Pushing Image') {
      environment {
               registryCredential = 'dockerhubitz'
           }
      steps{
	dir('proyecto') {
        script {
          docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
            dockerImage1.push("itz")
          }
        }
      }

        dir('phpmyadmin') {
        script {
          docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
            dockerImage2.push("itz")
          }
        }
      }
    }
  }

   //stage('Deploying App to Kubernetes') {
   //  steps {
   //    script {
   //      //kubernetesDeploy(configs: "deployment-service-simplesaml.yaml", kubeconfigId: "kuberkey")
   //       //sh 'microk8s.kubectl rollout restart prueba-gha'
   //     }        
   //   }
   // }

   stage('Restarting POD'){
   steps{
    sshagent(['sshsanchez'])
    {
     sh 'cd proyecto && scp -r -o StrictHostKeyChecking=no deployment.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment.yaml --kubeconfig=/home/digesetuser/.kube/config'
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment proyecto-itzel --kubeconfig=/home/digesetuser/.kube/config' 
 //          sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment proyecto-itzel --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
    
 
    sh 'cd phpmyadmin && scp -r -o StrictHostKeyChecking=no deployment.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment.yaml --kubeconfig=/home/digesetuser/.kube/config'
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment phpmyadmin-deployment-itzel --kubeconfig=/home/digesetuser/.kube/config'
  //         sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment phpmyadmin-deployment-itzel --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
      
     sh 'cd mysql && scp -r -o StrictHostKeyChecking=no deployment.yaml digesetuser@148.213.1.131:/home/digesetuser/'
      script{
        try{
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment.yaml --kubeconfig=/home/digesetuser/.kube/config'
           sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment mysql-deployment-itzel --kubeconfig=/home/digesetuser/.kube/config'
    //       sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment mysql-deployment-itzel --kubeconfig=/home/digesetuser/.kube/config'
          }catch(error)
       {}
    
     }
    }
  }
 }
}
}
}
}
